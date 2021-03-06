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

Route::get('/', 'SiteController@index');
Route::get('activity', 'SiteController@activity');
Route::get('how-to-play', 'SiteController@howtoplay');
Route::get('tc', 'SiteController@tc');
Route::post('image/upload', 'SiteController@uploadResult');
Route::get('tc', 'SiteController@tc');
Route::get('share/{id}', function ($id) {
    $data['id'] = $id;
    return view('sites/share',$data);
});
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
