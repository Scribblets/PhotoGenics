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

Route::get('/', function() {
	$data = [
		'cartCount' => 0, // cartCount NEEDS to be a session variable. This is for demo purposes, only
		'title' => "PhotoGenics - Home"
	];
	
	return View::make('home')->with($data);
	var_dump(session);
});

Route::get('/store/checkout', function() {
	$data['cartCount'] = 0;
	$data['title'] = "PhotoGenics - Checkout";
	return View::make('checkout', $data);
});

Route::get('/dashboard', function() {
	$data['cartCount'] = 0;
	$data['title'] = "PhotoGenics - Dashboard";
	return View::make('dashboard', $data);
});

/* Users: Register, Login, and Logout */
Route::post('/user/register', 'UserController@register_user');
Route::post('/user/login', 'UserController@login_user');
Route::get('/logout', 'UserController@logout_user');

/* Prints: Create, Read, Update, and Delete */
Route::get('/u/{username}', 'PrintController@read_print_by_username');
Route::post('/print/create', 'PrintController@create_print');
//	Route::post('/print/update', 'PrintController@update_print');
//	Route::get('/print/delete/{user_id}', 'PrinController@delete_print');