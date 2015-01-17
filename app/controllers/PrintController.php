<?php
	
class PrintController extends BaseController {
	
	public function create_print() {
		$file = Input::file('tf_file');
		
		if (Input::hasFile('tf_file')){
			// Store Image File in uploads/{username}
			$destinationPath = 'public/uploads/' . Auth::user()->username;
			
			echo 'user data';
			var_dump(Auth::user());
	
			echo 'file data';
			var_dump($file);
	
			$filename = $file->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension();
	
			$upload_success = Input::file('tf_file')->move($destinationPath, $filename);
	 		$path = 'uploads/' . Auth::user()->username . '/' . $filename;
	
			echo 'path to the file';
			var_dump($path);
	
		}
	
		//	For pushing to the database...
		$print_data = array(
			'user_id' 		=> Auth::id(),
			'path'			=> $path,
			'title' 		=> Input::get('tf_title'),
			'category' 		=> Input::get('tf_category'),
			'price' 		=> Input::get('tf_price'),
			'dimensions' 	=> Input::get('tf_dimensions'),
			'description' 	=> Input::get('tf_description')
			);
	
		
		echo "User_ID: " . $print_data['user_id'] . "<br />";
		echo "Title:" . $print_data['title'] . "<br />";
		echo "Category:" . $print_data['category'] . "<br />";
		echo "Price:" . $print_data['price'] . "<br />";
		echo "Dimensions:" . $print_data['dimensions'] . "<br />";
		echo "Description:" . $print_data['description'] . "<br />";
		// var_dump($print_data);
		//	This needs to go into the database!
	}
	
	public function read_print() {
		
	}
	
	public function update_print() {
		$print_data = array(
			'print_id'		=> Input::get('tf_print_id'),
			'title'			=> Input::get('tf_title'),
			'category'		=> Input::get('tf_category'),
			'price'			=> Input::get('tf_price'),
			'dimensions'	=> Input::get('tf_dimensions'),
			'description'	=> Input::get('tf_description')
		);
	}
	
	public function delete_print() {
		// Get Print From Database...
		// Delete Print...
	}
}