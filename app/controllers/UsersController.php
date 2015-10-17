<?php

class UsersController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$validator = Validator::make($data, User::getRules());

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['password'] = Hash::make($data['password']);
		$data['confirmation_token'] = sha1(uniqid($data['email'], true));

		User::create($data);

		Mail::send('emails.activate', $data, function($message) use($data) {
			$message->to($data['email'])->subject('Please verify your email address');
		});

		return Redirect::to('login')->with('alert-success', 'Signup successfully, please check your email');
	}

	/**
	* Show the current logged­in user's profile page.
	*
	* @return Response
	*/
	public function show()
	{
		return View::make('users.show')->withUser(Auth::user());
	}

	/**
	 * Confirm the email address and activate the account
	 *
	 * @param string $confirmation_token
	 * @return Response
	 */
	public function activate($confirmation_token)
	{
		if(User::activate($confirmation_token))	{
			return Redirect::to('login')->with('alert-success', 'Account activated, you can now login');
		}else{
			return Redirect::to('/')->with('alert-warning', 'Account activation code not found');
		}
	}


}