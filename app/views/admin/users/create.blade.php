@extends('layouts.master')

@section('body')
	<h1>New User</h1>

	<div class="container-fluid">
		{{ Form::open(array('route' => 'admin.users.store', 'class' => 'form-horizontal')) }}

			@include('admin.users.form')

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
					{{ HTML::linkRoute('admin.users.index', 'Cancel', null, array('class' => 'btn')) }}
				</div>
			</div>

		{{ Form::close() }}
	</div>
@stop