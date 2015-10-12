@if(Session::has('alert-success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('alert-success') }}
	</div>
@endif

@if(Session::has('alert-warning'))
	<div class="alert alert-warning" role="alert">
		{{ Session::get('alert-warning') }}
	</div>
@endif