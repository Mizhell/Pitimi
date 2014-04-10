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
            return Redirect::intended('/');
        } catch (ServiceException $e) {
            Log::info($e->getMessage());
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $this->warning(Lang::get('messages.badUsernameOrPassword'));
        return Redirect::route('login')->withInput(Input::only('username'));

    }

    public function showLogout()
    {
        try {
            UserService::logout();
        } catch (ServiceException $e) {
            Log::info($e->getMessage());
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $this->success(Lang::get('messages.successfullyLoggedOut'));
        return Redirect::route('login');
    }

}
