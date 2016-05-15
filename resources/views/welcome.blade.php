@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.

                    @role('admin')
                    <h2>Hello {{Auth::user()->username}}</h2>
                    <p>You are logged in as administrator</p>

                    @endrole
                    @role('admin')

                    <h2>Hello {{Auth::user()->username}}</h2>
                    <p>You are logged in as </p>


                    @endrole

                    @permission('admin','owner')
                    <p>This is visible to users with the given permissions. Gets translated to
                        \Entrust::can('manage-admins'). The can directive is already taken by core
                        laravel authorization package, hence the permission directive instead.</p>
                    @endpermission

                    <div class="row">
                        <div class="container">

                            {!! link_to_action('UserVerifyController@business','Create Business Account',null,['class' => 'btn btn-primary']) !!}
                            <br>
                            {!! link_to_action('UserVerifyController@personal','Create Personal Account',null,['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! link_to('user-roles','Connect Roles and Permission') !!} <br>
                        {!! link_to('permissions','Permissions') !!}<br>
                        {!! link_to('roles','Roles') !!}<br>
                        {!! link_to('roles/create','Create Role') !!}<br>
                        {!! link_to('permissions/create','Create Permission') !!}<br>
                        {!! link_to('permission-roles','Attach Permission to role') !!}<br>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
