<?php
	
class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	*/	
	public function register_user()
	{
		$errors = array();
		
		$userdata = array(
			'firstname' 	=> Input::get('tf_firstname'),
			'lastname' 		=> Input::get('tf_lastname'),
			'username' 		=> Input::get('tf_username'),
			'email'			=> Input::get('tf_email'),
			'password'		=> Input::get('tf_password'),
			'ver_password'	=> Input::get('tf_ver_password')
		);
		
		// Check Username
		$count_username = DB::table('users')->where('username', $userdata['username'])->first();
		if($count_username != NULL) {
			array_push($errors, "Username is taken.");
		}
		
		// Check Email
		$count_email = DB::table('users')->where('email', $userdata['email'])->first();
		if($count_email != NULL) {
			array_push($errors, "Email is already in use.");
		}
		
		// Check Passwords
		if($userdata['password'] != $userdata['ver_password']) {
			array_push($errors, "Passwords don't match.");
		}
		
		if(count($errors) > 0) {
			echo "There was an error creating your account. Please correct the following errors: <br>";
			
			foreach($errors as $err) {
				echo "- " . $err . "<br>";
			}
		} else {
			$userdata['password'] = Hash::make($userdata['password']);
			$newuser = User::create($userdata);
			return View::make('/dashboard');
		}
	}
	
	public function login_user()
	{
		$errors = array();
		
		$userdata = array(
			'username'	=>	Input::get('tf_login_username'),
			'password'	=>	Input::get('tf_login_password')
		);
	
	    // Debug for login....
		// echo 'Attempted username: ' .  Input::get('tf_login_username') . '<br/>';
		// echo 'Attempted password: ' .  Input::get('tf_login_password') . '<br/>';
	
		/* See if the 'Remember Me' is toggled */
		if(Input::get('persist') == 'on') {
			$isAuth = Auth::attempt($userdata, true);
		} else {
			$isAuth = Auth::attempt($userdata);
		}
	
		/* Is it in yet? */
		if($isAuth) {
	        // Login Successful
	        // Route to Dashboard
	        // Set Session
			return View::make('/dashboard');
		} else {
	    	// Login Failed
	    	// Display Error
			echo 'Username or password incorrect.';
			return Redirect::to('/');
		}
	}
	
	public function logout_user()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}