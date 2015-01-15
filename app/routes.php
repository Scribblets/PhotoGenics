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
		'cartCount' => 0, // cartCount NEEDS to be a session variable. This is for demo purposes, only
		'title' => "PhotoGenics - Home"
		
		];
		return View::make('home')->with($data);
		var_dump(session);
	});

Route::get('/details/{item_id}', function($item_id) {	
	// Fetch item data by $item_id...
	// Fetch up to four RANDOM related images from artist...
	
	$data = [
		'cartCount' => 0, // cartCount NEEDS to be a session variable. This is for demo purposes, only
		'title' => "PhotoGenics - Kitty", // Concatenate the Titles
		'item' => [
		'id' => $item_id,
		'source' => 'http://placekitten.com/g/340/340',
		'title' => 'Kitty',
		'artist' => 'Jebus Krist',
		'size' => '12" x 24"',
		'price' => 11.99,
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
		],
		'related' => [
		[
		'link' => '/details/12345',
		'source' => 'http://placekitten.com/g/225/225'
		],
		[
		'link' => '/details/12345',
		'source' => 'http://placekitten.com/g/225/225'
		],
		[
		'link' => '/details/12345',
		'source' => 'http://placekitten.com/g/225/225'
		],
		[
		'link' => '/details/12345',
		'source' => 'http://placekitten.com/g/225/225'
		]
		]
		];

		return View::make('details')->with($data);
	});

Route::get('/checkout', function() {
	$data['cartCount'] = 0;
	$data['title'] = "PhotoGenics - Checkout";
	return View::make('checkout', $data);
});

/* Where is this one going?? */
Route::get('/data/{url_var}', function($url_var)
{
	$data["url_var"] = $url_var;
	return View::make('rawr', $data);
});



/* Process the login request */ 
Route::post('login', function()
{

	$userdata = array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
		);

    // Debug for login....
	echo 'Attempted username: ' .  Input::get('username') . '<br/>';
	echo 'Attempted password: ' .  Input::get('password') . '<br/>';

	/* See if the 'Remember Me' is toggled */
	if(Input::get('persist') == 'on') {
		$isAuth = Auth::attempt($userdata, true);
	} else {
		$isAuth = Auth::attempt($userdata);
	}

	/* Is it in yet? */
	if($isAuth) {
        // We are in, go to dashboard
        // What are we saving into session, btw?
		echo 'Great succcess!';
        // return Redirect::to('dashboard');
	} else {
    	// Nope. Have to figure out how to pass the error data back here...
    	// Should we set up an optional argument on the route for the error?
    	// We could just set an error code in session and parse it out from there.
		echo 'Eternal shame.';
		// return Redirect::to('/');
	}
});

/* logout the user */
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('login');
});


/* register a new user */
Route::post('register', function(){
	$userdata = array(
		'firstname' => Input::get('firstname'),
		'lastname' 	=> Input::get('lastname'),
		'username' 	=> Input::get('username'),
		'email' 	=> Input::get('email'),
		'password' 	=> Input::get('password'),
		'ver_password' 	=> Input::get('ver_password')
		);

	if($userdata['password'] == $userdata['ver_password']){
		$userdata['password'] = Hash::make($userdata['password']);
	} else {
		echo "Dishonor on your family.";
	}


	var_dump($userdata);	

	$newuser = User::create($userdata);


});
