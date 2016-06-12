<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\TaggingTagged;
use App\UserTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Saedi\Transformers\PostTransformer;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Translation\Contracts\Translation;


class PostsController extends ApiController
{
    /**
     * @var App\Saedi\Transformers\PostsTransformer
     */
    protected $postTransformer;
    /**
     * @var Stevebauman\Translation\Contracts\Translation
     */
    protected $translation;
    /**
     * @var session()->get('locale','en')
     */
    protected $locale;

    public function __construct(Translation $translation,PostTransformer $postTransformer )
    {
        //Transform User
        $this->postTransformer = $postTransformer;
        $this->translation = $translation;
        $this->locale = Cache::get('locale');
        \Stevebauman\Translation\Facades\Translation::setLocale($this->locale);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang =  $this->locale;
        $posts = Post::orderBy('updated_at', 'DESC')->with('tagged')->get();
        return $this->respond([
            'data' => $this->postTransformer->transformCollection($posts->toArray()),
            'meta-data' => (boolean) rand(0,1),
            'locale' => $this->locale
            ]);

        //return view('posts.index',compact('posts','lang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::with('tagged')->get();
        return view('posts.create',compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post  = Post::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id
        ]);
        $post->retag( explode( ',', $request->get('tags') )  );

        return redirect('watchtower/posts')->with('flash.message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lang =  $this->locale;
        $post = Post::where("id","=",$id)->first();
        $posts = Post::with('tagged')->get();
        
        if( ! $post )
        {
            return $this->respondNotFound('Post Does not exist');
        }
        return $this->respond([
            'data' => $this->postTransformer->transform($post),
            'meta-data' => 'Here is some metadata'
        ]);

        //return view('posts.show',compact('post','posts','lang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Post::existingTags()->pluck('name');
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id
        ]);
        return $post->retag(explode(',', $request->get('tags')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function getByTag(Request $request)
    {
        $tag = $request->get('tags');
        $tags = explode(',', $tag);
        if($tags != null){
            $posts = Post::withAnyTag($tags)->get();
            return view('posts.tags',compact('posts','tag'));

        } else{
            return "The searched tag : <b>". $tag ."</b>not found";
        }
    }


    public function allTags()
    {
    //    $userId = Auth::user()->id;
        $tags = TaggingTagged::all();
        foreach ($tags as $tag){
            echo $tag->tag_name .'<br>';
        }
    }
    public function feed(){
        $tagsId = UserTag::where('user_id','=',Auth::user()->id)->get();
        $tags = [];

        foreach($tagsId as $tag):
            $tags[] = TaggingTagged::where( 'id', '=', $tag->tag_id )->first()->tag_name;
        endforeach;
        //Fetch all the post with tag
        $posts = Post::withAnyTag($tags)->get();
        //Converting to string
        $tags = implode(' , ', $tags);

        echo"<h3>Your subscribed to the tags : <small>".$tags."</small></h3>";

        foreach($posts as $post)
        {
            echo "<div style='padding:10px;background:#ededed;color: black;border-bottom:2px solid #ccc;width:50%;margin:0 auto;'>";
            echo "Posted By:".User::find($post->user_id)->first()->email;
            echo "<h4>".$post->title."</h4>";
            echo "<p>".$post->content."</p>";
            echo "</div>";
        }

    }
}
