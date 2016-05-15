@extends('vendor.watchtower.layouts.master')

@section('content')
	<section class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				{!! Form::open(['action' => 'PostsController@store'])  !!}
				@include('posts._form');
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@stop
@section('scripts')
	@include('posts.script')
@stop
