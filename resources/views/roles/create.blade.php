@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			{!! Form::open(['action' => 'RolesController@store']) !!}
				@include('roles._form')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop
