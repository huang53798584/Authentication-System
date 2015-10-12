@extends('layouts.master')

@section('body')
	<h1>Profile</h1>
	Your email address is {{ $user->email }} .
@stop