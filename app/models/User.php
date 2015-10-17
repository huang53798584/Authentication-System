<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('email', 'password', 'confirmation_token');


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Activate the account based on the confirmation token
	 *
	 * @param string $confirmation_token
	 * @return boolean
	 */
	public static function activate($confirmation_token)
	{
		$user = User::whereConfirmation_token($confirmation_token)->first();
		if($user){
			$user->is_confirmed = 1;
			$user->confirmation_token = null;
			$user->save();

			return true;
		}else{
			return false;
		}
	}

	/**
	 * Get validation rules
	 *
	 * @param int $user_id ID of existing
	 * @return array
	 */
	public static function getRules($user_id = null)
	{
		// New user
		if($user_id == null) {
			return array(
				'email' => 'required|email|unique:users',
				'password' => 'required|min:6|confirmed'
			);
		}
		// Existing user
		else {
			return array(
				'email' => 'required|email|unique:users,email,' . $user_id,
				'password' => 'sometimes|min:6|confirmed'
			);
		}
	}
}
