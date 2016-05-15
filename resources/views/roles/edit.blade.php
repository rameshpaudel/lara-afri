@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($roles ,['action' => 'RolesController@update']) !!}
                @include('permissions._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
