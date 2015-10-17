@extends('layouts.master')

@section('body')
	<h1>Login</h1>

	@include('alerts')

	<div class="container-fluid">

		{{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal')) }}

			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::text('email', Input::old('email'), array('placeholder' => 'email address', 'autofocus' => 'autofocus', 'class' => 'form-control'))  }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::checkbox('remember_me', '1', null, array('id' => 'remember_me')) }}
					{{ Form::label('remember_me', 'Remember me') }}
					
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
					{{ HTML::link('password/remind', 'Forgot password?') }}
				</div>
			</div>
			
		{{ Form::close() }}
	</div>	
@stop