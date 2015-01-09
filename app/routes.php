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

Route::get('/', function()
{
	$data = [
		'title' => "PhotoGenics - Home",
		'cartCount' => 0
	];
	return View::make('home')->with($data);
});

/*
| TEMPORARY
*/
Route::get('/details', function() {
	return View::make('home');
});


Route::get('/details/{item_id}', function($item_id) {
	$data["id"] = $item_id;
	// Fetch item by id...
	return View::make('details', $data);
});

Route::get('/data/{url_var}', function($url_var)
{
	$data["url_var"] = $url_var;
	return View::make('rawr', $data);
});