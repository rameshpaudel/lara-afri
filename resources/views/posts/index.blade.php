@extends('vendor.watchtower.layouts.master')

@section('content')
    <h1>Posts
        <div class="btn-group pull-right" role="group" aria-label="...">

            <a href="{{ route('watchtower.posts.create') }}">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus fa-fw"></i>
                    <span class="hidden-xs hidden-sm">Add New Post</span>
                </button></a>
        </div>
    </h1>
    <div class="container">
        <div class="row">
            Search By tags:
            {!! Form::open(['url' => "tag-posts", 'method'=>'GET']) !!}
                {!! Form::text('tags') !!}
            {!! Form::close() !!}
        </div>
    </div>
    <section class="container">
        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Time</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td></td>

                            <td>{{ _t($post->title ,[], $lang) }}</td>
                            <td>{{ _t($post->content ,[], $lang) }}</td>
                            @if($post->updated_at !== null)
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            @else
                                <td>{{ $post->updated_at}}</td>
                            @endif
                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="badge">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@stop

@section('scripts')
    @include('posts.script')
@stop
