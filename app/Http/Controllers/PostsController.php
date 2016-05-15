<?php

namespace App\Http\Controllers;

use App\Post;

use App\TaggingTagged;
use App\TagSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->with('tagged')->get();
        return view('posts.index',compact('posts'));

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
        $post = Post::find($id);
        $posts = Post::with('tagged')->get();
        return view('posts.show',compact('post','posts'));

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

        }else{
            return "The searched tag : <b>". $tag ."</b>not found";
        }
    }

    public function feed()
    {
        $userId = Auth::user()->id;
        $tags = TagSubscription::where('user_id','=', $userId)->get();
        dd($tags);
    }
}
