<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('signup', 'UsersController@create');
// Route::get('profile', array('before' => 'auth', 'uses' => 'UsersController@show'));
Route::resource('users', 'UsersController');

Route::controller('password', 'RemindersController');

Route::get('activate/{confirmationToken}', 'UsersController@activate');

// Route::group(array('namespace' => 'Admin',
// 		'prefix' => 'admin',
// 		'before' => 'auth'
// 	),	function() {
// 		Route::resource('users', 'UsersController');
// 	}
// );

Route::group(array('before' => 'auth'), function() {
	Route::get('profile', array('uses' => 'UsersController@show'));
	Route::group(array('namespace' => 'Admin', 'prefix' => 'admin', 'before' => 'admin'), function() {
		Route::resource('users', 'UsersController');
	});
});