@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		{!! Form::open(['action' =>'UserRegistrationController@registerBusinessAccount', 'files'=>true, 'class' => 'form-group']) !!}
			<div class="form-group">
				<h1>Register | Business Account</h1>
				<div class="row">


					<div class="col-md-6">
						{!! Form::select('user_type',array('1' => 'Public','2' => 'Private' ), null,['placeholder' => 'Public/Private', 'class' => 'form-control']) !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('company_name',null,['placeholder' => 'Company/Orgainization', 'class' => 'form-control']) !!}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						{!! Form::select('category',range(1,100), null,['placeholder' => 'Category','class'=>'form-control']) !!}
					</div>
					<div class="col-md-6">

						{!! Form::email('email',null,['placeholder' => 'Email','class' => 'form-control']) !!}
					</div>
					<div class="col-md-12">

						{!! Form::text('username',Input::old('username') or null,['placeholder' => 'Username','class' => 'form-control']) !!}
					</div>
					<div class="col-md-12">

						{!! Form::password('password',['placeholder' => 'Password','class' => 'form-control']) !!}
					</div>
					<div class="col-md-12">

						{!! Form::password('re_password',['placeholder' => 'Confirm Password','class' => 'form-control']) !!}
					</div>
				</div>
			</div>



			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						{!! Form::file('certificate')  !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('address',null,['placeholder' => 'Address','class'=>'form-control']) !!}
					</div>
				</div>
			</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-6">
					{!! Form::text('city',null,['placeholder' => 'City','class'=>'form-control']) !!}
				</div>
				<div class="col-md-6">
					{!! Form::text('country',null,['placeholder' => 'Country','class'=>'form-control']) !!}
				</div>
			</div>
		</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-12">
						{!! Form::label('established_on','Established On : ') !!}
						{!! Form::date('established_on',null, ['placeholder' => 'Founded on','class'=>'form-control']) !!}
					</div>
				</div>

			</div>

			<h3>Personal Info</h3>
		<div class="form-group">
			<div class="col-md-12">
				{!! Form::text('first_name',null,['placeholder' =>'Full Name','class'=>'form-control'])!!}
			</div>
			<div class="col-md-12">
				{!! Form::text('last_name',null,['placeholder' =>'Last Name','class'=>'form-control'])!!}
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				{!! Form::text('personal_email',null,['placeholder' =>'Personal Email','class'=>'form-control'])!!}
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				{!! Form::text('personal_address',null,['placeholder' =>'Personal Address','class'=>'form-control'])!!}
			</div>
		</div>
			{!! Form::hidden('type','business') !!}
		<div class="form-group">
			{!! Form::submit('submit',[ 'class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	</div>
</div>

@stop