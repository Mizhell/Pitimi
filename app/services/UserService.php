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
        Log::info('Authenticating...', compact('username'));

        if ( ! Auth::attempt(array('username' => $username, 'password' => $password))) {
            throw new ServiceException('Invalid username or password');
        }
    }
}
