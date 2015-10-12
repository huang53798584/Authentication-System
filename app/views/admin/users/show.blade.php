@extends('layouts.master')
@section('body')
	<h1>User</h1>

	@include('alerts')

	<p>{{ HTML::linkRoute('admin.users.index', '<< back to list of users') }}</p>

	<table class="table table-condensed">
		<tbody>
			<tr>
				<th>email</th>
				<td>{{ $user->email }}</td>
			</tr>

			<tr>
				<th>Administrator</th>
				<td>{{{ $user->is_admin ? 'yes' : 'no' }}}</td>
			</tr>
		</tbody>
	</table>

	{{ HTML::linkRoute('admin.users.edit', 'Edit', $user->id, array('class' => 'btn btn-default')) }}

	{{ Form::open(array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'style' => 'display: inline;', 'class' => 'delete')) }}
		@if(Auth::user()->id == $user->id)
			{{ Form::submit('Delete', array('class' => 'btn btn-default', 'disabled' => 'disabled')) }}
		@else
			{{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
		@endif

	{{ Form::close() }}
@stop