<?php
	
class HomeController extends BaseController {
	
	public function home() {
		if(Auth::check()) {
			// Get up to 25-50 random images.
			$random_prints = Prints::orderBy(DB::raw('RAND()'))->take(25)->get();
			$prints = array();
			
			foreach ($random_prints as $r_print) {
				$user = User::whereId($r_print['user_id'])->first();
				
				$p = array(
					'id' => $r_print['id'],
					'path' => $r_print['path'],
					'title' => $r_print['title'],
					'category' => $r_print['category'],
					'artist' => $user['firstname'] . " " . $user['lastname'],
					'price' => $r_print['price'],
					'artist_username' => $user['username']
				);
				
				array_push($prints, $p);
			}
			
			$data['prints'] = $prints;
			return View::make('users', $data);
		} else {
			return View::make('home');
		}
	}
	
	public function browse() {
		$random_prints = Prints::orderBy(DB::raw('RAND()'))->take(25)->get();
			$prints = array();
			
			foreach ($random_prints as $r_print) {
				$user = User::whereId($r_print['user_id'])->first();
				
				$p = array(
					'id' => $r_print['id'],
					'path' => $r_print['path'],
					'title' => $r_print['title'],
					'category' => $r_print['category'],
					'artist' => $user['firstname'] . " " . $user['lastname'],
					'price' => $r_print['price'],
					'artist_username' => $user['username']
				);
				
				array_push($prints, $p);
			}
			
			$data['prints'] = $prints;
			return View::make('users', $data);
	}
}