<?php

class PrintController extends BaseController {
	
	public function create_print() {
		$file = Input::file('tf_file');
		
		if (Input::hasFile('tf_file')){
			// Store Image File in uploads/{username}
			$destinationPath = 'public/uploads/' . Auth::user()->username;

			// echo 'user data';
			// var_dump(Auth::user());	
			// echo 'file data';
			// var_dump($file);

			$filename = $file->getClientOriginalName();

			$upload_success = Input::file('tf_file')->move($destinationPath, $filename);
			$path = 'public/uploads/' . Auth::user()->username . '/' . $filename;

			// echo 'path to the file';
			// var_dump($path);

			//	For pushing to the database...
			$print_data = array(
				'path'			=> $path,
				'user_id' 		=> Auth::id(),
				'title' 		=> Input::get('tf_title'),
				'category' 		=> Input::get('tf_category'),
				'price' 		=> Input::get('tf_price'),
				'dimensions' 	=> Input::get('tf_dimensions'),
				'description' 	=> Input::get('tf_description')
				);

			//	Show pretty things
			echo "User_ID: " . $print_data['user_id'] . "<br />";
			echo "Title:" . $print_data['title'] . "<br />";
			echo "Category:" . $print_data['category'] . "<br />";
			echo "Price:" . $print_data['price'] . "<br />";
			echo "Dimensions:" . $print_data['dimensions'] . "<br />";
			echo "Description:" . $print_data['description'] . "<br />";

			//	Put it in the database
			$newPrint = Prints::create($print_data);

		}

	}
	
	public function read_print_by_username($username) {
		$user = DB::table('users')->where('username', $username)->first();
		//var_dump($user->id);
		// echo $user->id;
		$print = DB::table('prints')->where('user_id', $user->id)->orderBy('created_at')->get();
		var_dump($print);

		$thisPrint = Prints::whereUser_id('1')->get();
		var_dump($thisPrint);
	}
	
	public function update_print() {

		$thisPrint = Prints::findOrFail(1);
		$thisPrint = Prints::where('id', '=', Input::get('tf_print_id'))->get();

		$print_data = array(
			'print_id'		=> Input::get('tf_print_id'),
			'title'			=> Input::get('tf_title'),
			'category'		=> Input::get('tf_category'),
			'price'			=> Input::get('tf_price'),
			'dimensions'	=> Input::get('tf_dimensions'),
			'description'	=> Input::get('tf_description')
			);


			//	Put it in the database
			$thisPrint = Prints::where('tf_print_id');
	}
	
	public function delete_print() {
		// Get Print From Database...
		// Delete Print...
	}
}