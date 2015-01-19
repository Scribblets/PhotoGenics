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
			$html = "<b>Register Error!</b> ";
			foreach($errors as $err) {
				$eHTML = $err . " ";
				$html .= $eHTML;
			}
			
			Session::flash('flash_message', $html);
			Session::flash('flash_type', 'alert-danger');			
			
			return Redirect::to('/');
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
	
		/* See if the 'Remember Me' is toggled */
		if(Input::get('persist') == 'on') {
			$isAuth = Auth::attempt($userdata, true);
		} else {
			$isAuth = Auth::attempt($userdata);
		}
	
		/* Is it in yet? */
		if($isAuth) {
	        // Login Successful route to Dashboard
	        return Redirect::to('/dashboard');
		} else {
	    	Session::flash('flash_message', "<b>Login Error!</b> Username or password is incorrect.");
			Session::flash('flash_type', 'alert-danger');
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

			$data['prints'] = Prints::whereUser_id(Auth::user()->id)->get();
			$order_items = OrderItems::whereUser_id(Auth::user()->id)->get();
			
			
			$order_ids = array();
			// $result = array_unique($data['order_items']);
			foreach($order_items as $order_item) {
				if(!in_array($order_item->order_id, $order_ids)) {
				    array_push($order_ids, $order_item->order_id);
				}
			}
			
			$orders = array(); // Display unique orders, only.
			
			foreach($order_ids as $id) {
				$order = Orders::whereOrder_id($id)->first();
				array_push($orders, $order);
			}
			
			$data['order_items'] = $order_items;
			$data['order_ids'] = $order_ids;
			$data['orders'] = $orders;
			
			/*
foreach($orders as $order) {
				echo $order->order_id . "<br><br>";
			}
*/
			
			// Bootstrap Modal Array
			// - For each Order Items...
			// - If Order Items -> Order ID is equal to the current order id value...
			// - Display Order Item info.
			
			// - For each Print Item...
			// - If Order Items -> Print ID is equal to the current print id value...
			// - Display Print Item info...
			
			/*
$data['orders'] = array();
			foreach($data['order_items'] as $doi) {
				$order = Orders::whereOrder_id($data['order_items']->order_id)->get();
				array_push($data['orders'], $order)
			}
*/
			
			
			// #1	Kitty
			// #1	Rawr
			// #2	Kitty

			// var_dump($data);
			return View::make('dashboard', $data);

		} else {
			Session::flash('flash_message', "<b>Login Error!</b> You must be logged in to do that!");
			Session::flash('flash_type', 'alert-danger');
			return Redirect::to('/');
		}
	}
}