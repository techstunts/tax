<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('login', function () {
    return view('user.login');
});

Route::get('/signup', function () {
    return view('user.signup');
});

Route::get('/forgot-password', function () {
    return view('user.forgot-password');
});

Route::get('/change-password', function () {
    return view('user.change-password');
});
