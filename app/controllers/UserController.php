<?php
	
class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	*/	
	public function register_user() {
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
			$newUser = User::create($userdata);
			
			if($newUser){
            	Auth::login($newUser);
            	Session::flash('flash_message', '<b>Success!</b> Your account was successfully created! Welcome to your dashboard.');
				Session::flash('flash_type', 'alert-success');
            	return Redirect::to('/dashboard');
			} else {
				Session::flash('flash_message', '<b>Error!</b> An error occurred while logging you in. Please try again.');
				Session::flash('flash_type', 'alert-danger');
				return Redirect::to('/');
			}
		}
	}
	
	public function login_user() {
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
	        return Redirect::to('/dashboard');
	        // return Route::post('/dashboard/', 'UserController@login_user');
			// return View::make('/dashboard');
		} else {
	    	// Login Failed
	    	// Display Error
			echo 'Username or password incorrect.';
			return Redirect::to('/');
		}
	}
	
	public function logout_user() {
		Auth::logout();
		Session::flush();		
		return Redirect::to('/');
	}
	
	public function user_dashboard() {
		// Get All Prints by User
		// Get All Orders by User... Not very hard... :D
		if(Auth::check()) {
			$current_uid = Auth::user()->id;
			$prints = Prints::whereUser_id($current_uid)->get();
			$data['prints'] = $prints;
			
			// $data['orders'] = $orders;
			return View::make('dashboard', $data);
			
/*
			foreach($prints as $print) {
				echo "Title:" . $print['title'];
				echo "<br><br>";
			}
*/
		} else {
			return Redirect::to('/');
		}
	}
}