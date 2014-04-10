<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		if (Auth::check()) {
			return Redirect::route('home');
		} else {
			return View::make('login', array('title' => Lang::get('messages.login')));
		}
	}

    public function processLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        try {
            UserService::authenticate($username, $password);
            return Redirect::intended('home');
        } catch (ServiceException $e) {
            Log::info($e->getMessage());
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return Redirect::route('/')->withInput(Input::only('username'));

    }

}
