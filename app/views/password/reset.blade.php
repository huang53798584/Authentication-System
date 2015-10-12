@extends('layouts.master')

@section('body')
	<h1>Password Reset</h1>

	@include('alerts')

	<div class="alert" role="alert">
		{{ Session::get('error') }}
	</div>

	<div class="container-fluid">
		{{ Form::open(array('action' => 'RemindersController@postReset', 'class' => 'form-horizontal')) }}

			{{ Form::hidden('token', $token) }}

			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::text('email', null, array('placeholder' => 'email address', 'autofocus' => 'autofocus', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'Repeat password', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::password('password_confirmation', array('placeholder' => 'repeat password', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Reset Password', array('class' => 'btn btn-success')) }}
				</div>
			</div>

		{{ Form::close() }}
	</div>
@stop