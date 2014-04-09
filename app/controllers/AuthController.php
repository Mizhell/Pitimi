<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		if (Auth::check()) {
			return Redirect::route('login');
		} else {
			return View::make('login', array('title' => Lang::get('messages.login')));
		}
	}

}