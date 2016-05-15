@extends(config('watchtower.views.layouts.master'))

@section('content')

    <h1>Create New User</h1>
    <hr/>
    {!!  Form::open(['action' => 'UploadsController@store','files'=>true, 'method' => 'post']) !!}
    @include('uploads._form')
    {!!  Form::close() !!}
@stop