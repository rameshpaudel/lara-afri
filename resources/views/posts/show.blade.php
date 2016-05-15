@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row">
           <div class="content col-md-12">
               <h1>{{ $post->title }}</h1>
               <p>{{ $post->content }}</p>
               @foreach($post->tags as $tags)
                   <span class="badge">{{ $tags->name }}</span>
               @endforeach
           </div>
        </div>
    </section>
@stop
@section('scripts')
    @include('posts.script')
@stop
