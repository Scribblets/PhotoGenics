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

	/* bypass the splash screen if the user is remembered */
	if(Auth::viaRemember()) {
		return Redirect::to('/dashboard');
	} else {
		return View::make('home');
	}});

/* User Routes */
Route::post('/user/register', 'UserController@register_user');
Route::post('/user/login', 'UserController@login_user');
Route::get('/logout', 'UserController@logout_user');

/* Front-End Routes  */
Route::get('/u/{username}', 'PrintController@read_all_prints_by_username');
Route::get('/u/{username}/{print_id}', 'PrintController@read_print_by_ids');

/* Back-End Routes */
Route::get('/dashboard', 'UserController@user_dashboard');
Route::post('/print/create', 'PrintController@create_print');
Route::post('/print/update/{print_id}', 'PrintController@update_print');
Route::get('/print/delete/{print_id}', 'PrintController@delete_print');

/* Checkout Routes */
Route::get('/cart/add/{print_id}', 'CartController@add_to_cart');
Route::get('/cart/delete/{session_index}', 'CartController@delete_from_cart_by_index');
Route::get('/checkout', 'CartController@read_all');

/* stripe payment routes */
<<<<<<< HEAD
// Route::post('');
=======
Route::post('');
>>>>>>> FETCH_HEAD
