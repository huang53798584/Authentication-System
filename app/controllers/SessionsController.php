<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'is_confirmed' => 1
		);

		$remember = Input::get('remember_me') == '1';

		if(Auth::attempt($credentials, $remember)) {
			return Redirect::intended('/')->with('alert-success', 'You have been logged in');
		}else{
			return Redirect::back()->with('alert-warning', 'Incorrect login')->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/')->with('alert-success', 'You have been logged out');;
	}

}