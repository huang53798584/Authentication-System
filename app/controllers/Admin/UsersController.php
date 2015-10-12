<?php namespace Admin;

use View, User, Input, Validator, Redirect, Hash;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('email')->paginate(5);

		return View::make('admin.users.index', array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
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

		$user = new User;

		$user->fill($data);
		$user->is_confirmed = true;
		$user->is_admin =(bool)array_get($data, 'is_admin');

		$user->save();


		return Redirect::route('admin.users.show', array('id' => $user->id))->with('alert-success', 'User created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('admin.users.show', array('user' => $user));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return View::make('admin.users.edit', array('user' => $user));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$data = Input::all();

		// Remove password if not set
		if($data['password'] == '') {
			$data = array_except($data, 'password');
		}

		$validator = Validator::make($data, User::getRules($id));

		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// Hash the password if present
		if(array_key_exists('password', $data)) {
			$data['password'] = Hash::make($data['password']);
		}

		$user->fill($data);

		$user->is_admin = (bool)array_get($data, 'is_admin');
		$user->save();

		return Redirect::route('admin.users.show', array('id' => $user->id))->with('alert-success', 'Changes saved');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admin.users.index')->with('alert-success', 'Successfully deleted');
	}


}
