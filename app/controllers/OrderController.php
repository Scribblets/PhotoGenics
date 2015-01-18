<?php
	
class HomeController extends BaseController {
	
	public function home() {
		if(Auth::check()) {
			return View::make('user', $data);
		} else {
			return View::make('home');
		}
	}
}