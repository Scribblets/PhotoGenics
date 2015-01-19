<?php
	
class PrintController extends BaseController {
	
	public function create_print() {
		$file = Input::file('tf_file');
		
		if (Input::hasFile('tf_file')){
			if(Input::get('tf_title') != '' && Input::get('tf_category') != '' && Input::get('tf_price') != '' && Input::get('tf_dimensions') != '' && Input::get('tf_description') != '') {
				$destinationPath = 'public/uploads/' . Auth::user()->username;
		
				$filename = $file->getClientOriginalName();
		
				$upload_success = Input::file('tf_file')->move($destinationPath, $filename);
		 		$path = '/uploads/' . Auth::user()->username . '/' . $filename;
		 		
		 		$print_data = array(
					'path'			=> $path,
					'user_id' 		=> Auth::id(),
					'title' 		=> Input::get('tf_title'),
					'category' 		=> Input::get('tf_category'),
					'price' 		=> Input::get('tf_price'),
					'dimensions' 	=> Input::get('tf_dimensions'),
					'description' 	=> Input::get('tf_description')
				);
				
				$newPrint = Prints::create($print_data);
			} else {
				Session::flash('flash_message', '<b>Error!</b> All fields are required. Please try again.');
				Session::flash('flash_type', 'alert-danger');
			}
		} else {
			Session::flash('flash_message', '<b>Error!</b> No image was uploaded. Please try again.');
			Session::flash('flash_type', 'alert-danger');
		}
	
		return Redirect::to('/dashboard');
	}
	
	public function read_all_prints_by_username($username) {
		$user = User::whereUsername($username)->first();
		$prints = Prints::whereUser_id($user->id)->get();
		
		$data['user'] = array('firstname' => $user->firstname, 'lastname' => $user->lastname, 'username' => $username);
		$data['prints'] = $prints;
		
		return View::make('user')->with($data);
	}
	
	public function read_print_by_ids($username, $print_id) {
		$user = User::whereUsername($username)->first();
		$print = Prints::whereId($print_id)->whereUser_id($user['id'])->first();
		$count = Prints::whereUser_id($user['id'])->count();
		
		if($count >= 2) {
			$data['random']['enough'] = true;
			if($count >= 5) {
				$count = 4;
				$data['random']['class'] = "more" . $count;
			} else {
				$count = $count - 1;
				$data['random']['class'] = "more" . $count;
			}
		} else {
			$data['random']['enough'] = false;
		}
		
		$random_prints = Prints::whereUser_id($user['id'])->whereNotIn('id', [$print_id])->orderBy(DB::raw('RAND()'))->take($count)->get();
		
		$data['print'] 				= $print;
		$data['user']['firstname'] 	= $user['firstname'];
		$data['user']['lastname'] 	= $user['lastname'];
		$data['user']['username'] 	= $username;
		$data['random']['prints'] 	= $random_prints;
		
		return View::make('details')->with($data);
	}

	public function update_print($print_id) {
		if(Input::get('tf_title') != '' && Input::get('tf_category') != '' && Input::get('tf_price') != '' && Input::get('tf_dimensions') != '' && Input::get('tf_description') != '') {
			$print_data = array(
				'title'			=> Input::get('tf_title'),
				'category'		=> Input::get('tf_category'),
				'price'			=> Input::get('tf_price'),
				'dimensions'	=> Input::get('tf_dimensions'),
				'description'	=> Input::get('tf_description')
			);
			
			$print = Prints::find($print_id);
			$print->title = Input::get('tf_title');
			$print->category = Input::get('tf_category');
			$print->price = Input::get('tf_price');
			$print->dimensions = Input::get('tf_dimensions');
			$print->description = Input::get('tf_description');
			$print->save();
		} else {
			Session::flash('flash_message', '<b>Error!</b> All fields are required. Please try again.');
			Session::flash('flash_type', 'alert-danger');
		}
		
		return Redirect::to('/dashboard');
	}
	
	public function delete_print($print_id) {
		$print = Prints::find($print_id);
		$print->delete();
		
		return Redirect::to('/dashboard');
	}
}