@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' => 'UserVerifyController@attachUsersToRoles', 'method' => 'post','class' => 'form-horizontal']) !!}
            <div class="form-group">

                <div class="col-md-12">
                    {!! Form::select('permission_id', $permissions , null , ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::select('role_id', $roles , null , ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!!  Form::submit('Submit', ['class' => 'btn btn-primary'])  !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
