<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

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

		$user = User::create($data);

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
		return View::make('users.show', array('user' => Auth::user()));
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

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}