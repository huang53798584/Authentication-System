@extends('layouts.master')

@section('body')

	{{ HTML::linkRoute('admin.users.create', 'Add a new user', null, array('class' => 'btn btn-default pull-right')) }}

	<h1>User Admin</h1>

	@include('alerts')

	<table class="table">
		
		<thead>
			<tr>
				<th>Email Address</th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ HTML::linkRoute('admin.users.show', $user->email, $user->id) }}</td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{{ $users->links() }}
@stop