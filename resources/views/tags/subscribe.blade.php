@extends('layouts.app')

@section('content')
    <h1>Click on a tag to subscribe</h1>
    <ul>
        @foreach($tags as $tag)
            <li><a href="{{$tag->id}}">{{$tag->tag_name}}</a></li>
        @endforeach
    </ul>
@endsection

