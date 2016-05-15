@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                {!! Form::open(['action' => 'PostsController@update', 'method' => 'PUT'])  !!}
                    @include('posts._form');
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop
@section('scripts')
    @include('posts.script')
@stop
