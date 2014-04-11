<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('login', array(
    'as' => 'login',
    'uses' => 'AuthController@showLogin'
));

Route::post('login', array(
    'uses' => 'AuthController@processLogin'
));

/* Secured paths */

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showHome'));
    Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@showLogout'));

    Route::get('congregations', array(
        'uses' => 'CongregationController@showCongregations',
        'as'   => 'congregations.list'
    ));
    Route::get('congregation/create', array(
        'uses' => 'CongregationController@createCongregation',
        'as'   => 'congregations.create'
    ));
});
