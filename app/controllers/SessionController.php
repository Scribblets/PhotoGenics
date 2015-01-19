<?php
	
class SessionController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	*/	
	public function showSession()
	{
		Session::put('hi','I am a session.');
		$doIwork = Session::get('hi');
		echo $doIwork;
	}
}