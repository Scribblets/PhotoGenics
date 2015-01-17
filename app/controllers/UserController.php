<?php

class UserController extends BaseController {

	/**
	 * Show profile for given user, using the user id
	 */
	public function showProfile($id)
    {
        $user = User::find($id);

        return View::make('user.profile', array('user' => $user));
    }

}