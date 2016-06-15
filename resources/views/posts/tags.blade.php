@extends('vendor.watchtower.layouts.master')

@section('content')
    <h1>Posts
        <div class="btn-group pull-right" role="group" aria-label="...">

            <a href="{{ route('dash.posts.create') }}">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus fa-fw"></i>
                    <span class="hidden-xs hidden-sm">Add New Post</span>
                </button></a>
        </div>
    </h1>


    @foreach($posts as $post)
        <h1>{{$post->title}}</h1>
        <p>{{$post->content}}</>
        <p>{{ $post->updated_at->diffForHumans() }}</p>
    @endforeach
@stop

