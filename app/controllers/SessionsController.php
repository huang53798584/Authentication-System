<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$creds = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'is_confirmed' => 1
		);
		$remember = Input::get('remember_me');

		if(Auth::attempt($creds, $remember)) {
			return Redirect::intended('/')->with('alert-success', 'You have been logged in');
		}else{
			return Redirect::back()
					->withInput()
					->with('alert-warning', 'Incorrect login');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/')->with('alert-success', 'You have been logged out');;
	}

}