<?php

class UserService
{
    /**
     * Authenticate a user.
     *
     * @param $username The username.
     * @param $password The password.
     */
    public static function authenticate($username, $password)
    {
        Log::info('Authenticating user.', compact('username'));

        if ( ! Auth::attempt(array('username' => $username, 'password' => $password))) {
            throw new ServiceException('Invalid username or password');
        }
    }

    /**
     * Logout a user.
     */
    public static function logout()
    {
        Log::info('Logout user.', array(Auth::user()->username));

        Auth::logout();
    }
}
