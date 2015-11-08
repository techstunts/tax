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

Route::get('/user/{page}', function ($page) {
    return view('user.' . $page);
});

Route::get('/efiling/{tax_payer_type}/{step}', 'EFilingController@step');
Route::post('/efiling/{tax_payer_type}/{step}', 'EFilingController@update');

Route::get('{slug}','PostsController@view')->where('slug','([A-z0-9-_\/\.]+)');