<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Http\Requests;
use App\TaggingTagged;
use App\UserTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Saedi\Transformers\TagsTransformer;


class TagsSubscriptionController extends ApiController
{
    protected $tagTransformer;
    
    public function __construct(TagsTransformer $tagsTransformer)
    {
       $this->tagTransformer = $tagsTransformer; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with('tagged')->get();
        $tags = TaggingTagged::all();
        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->toArray()),
            'meta-data' => (boolean) rand(0,1)
        ]);
        //return view('tags.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = TaggingTagged::all();
        return view('tags.subscribe', compact('tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'store'  ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit'.$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'update'. $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'delete'.$id;
    }

    public function subscribe(Request $request)
    {
        if ($request->all()) {
            UserTag::create([
                'user_id' => Auth::user()->id,
                'tag_id' => $request->get('tag_id')
            ]);

           return redirect('tag-feed');

        }
        return 'No request';
    }
}
