@extends('layouts.master')

@section('body')
	<h1>Welcome</h1>

	@include('alerts')

	@if(Auth::check())
		You are logged in.
	@else
		You are not logged in. {{ HTML::link('login', 'Login') }} or
		{{ HTML::link('signup', 'Sign up') }}.
	@endif
@stop