@extends(config('watchtower.views.layouts.master'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-user"></i></div>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-envelope"></i></div>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                {!! $errors->first('username', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-envelope"></i></div>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-lock"></i></div>
                                <input type="password" class="form-control" name="password">
                                {!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-1x fa-fw fa-lock"></i></div>
                                <input type="password" class="form-control" name="password_confirmation">
                                {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection