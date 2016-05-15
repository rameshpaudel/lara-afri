@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>Register | Personal Account</h1>
		{!! Form::open(['action'=>'UserRegistrationController@registerPersonalAccount','class' => 'form-horizontal']) !!}
			<div class="form-group">
				<div class="col-md-6">
					{!! Form::text('first_name',null,['placeholder' => 'First Name :','class'=> 'form-control']) !!}
				</div>
				<div class="col-md-6">
					{!! Form::text('last_name',null,['placeholder' => 'Last Name:','class'=> 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					{!! Form::email('email',null,['placeholder' => 'Email:','class'=> 'form-control']) !!}
				</div>
				<div class="col-md-6">
					{!! Form::text('country',null,['placeholder' => 'Country :','class'=> 'form-control']) !!}
				</div>
				<div class="col-md-12">
					{!! Form::text('username',Input::old('username') or null,['placeholder' => 'Username', 'class' => 'form-control']) !!}
				</div>
				<div class="col-md-12">
					{!! Form::password('password',['placeholder' => 'Password', 'class' => 'form-control']) !!}
				</div>
				<div class="col-md-12">
					{!! Form::password('re_password',['placeholder' => 'Confirm password','class' => 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					{!! Form::label('dob', 'Date of Birth', ['class' => 'control-label']) !!}
					{!! Form::date('dob',null,['placeholder' => 'Date of Birth :','class'=> 'form-control']) !!}
				</div>
			</div>

			{!! Form::hidden('type','personal') !!}
			<div class="form-group">
				{!! Form::submit('submit',[ 'class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>

@stop