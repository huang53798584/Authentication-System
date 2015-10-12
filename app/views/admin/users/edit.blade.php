@extends('layouts.master')

@section('body')
	<h1>Edit User</h1>

	<div class="container-fluid">
		{{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

			@include('admin.users.form')

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
					{{ HTML::linkRoute('admin.users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
				</div>
			</div>

		{{ Form::close() }}
	</div>
@stop