@extends('layouts.master')

@section('body')
	<h1>Signup</h1>
	<div class="container-fluid">

		{{ Form::open(array('route' => 'users.store', 'class' => 'form-horizontal')) }}

			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::text('email', Input::old('email'), array('placeholder' => 'email address', 'autofocus' => 'autofocus', 'class' =>'form-control')) }}
				</div>
				<div class="col-sm-5">
					{{ $errors->first('email') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::password('password', array('placeholder' => 'password', 'class' =>'form-control')) }}
				</div>
				<div class="col-sm-5">
					{{ $errors->first('password') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'Confirm password', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::password('password_confirmation', array('placeholder' => 'repeat password', 'class' =>'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Sign up', array('class' => 'btn btn-success')) }}
				</div>
			</div>
			
		{{ Form::close() }}
	</div>
@stop