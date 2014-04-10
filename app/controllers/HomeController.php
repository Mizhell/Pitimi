<?php

class HomeController extends BaseController {

    public function __construct() {
        $this->setMenu('home');
    }

	public function showHome()
	{
		if (Auth::check()) {
			return View::make('home', array('title' => Lang::get('messages.home')));
		} else {
			return Redirect::route('login');
		}
	}

}
