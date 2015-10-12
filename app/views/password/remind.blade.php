@extends('layouts.master')

@section('body')
	<h1>Password Reminder</h1>

	<div class="container-fluid">
		{{ Form::open(array('action' => 'RemindersController@postRemind', 'class' => 'form-horizontal')) }}

			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					{{ Form::text('email', null, array('placeholder' => 'email address', 'autofocus' => 'autofocus', 'class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Send Reminder', array('class' => 'btn btn-warning')) }}
				</div>
			</div>
			
		{{ Form::close() }}
	</div>
@stop