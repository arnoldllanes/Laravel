<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//HOME
Route::group(['middleware' => ['web']], function () {
	Route::get('/', [
		'uses'	=> '\Chatty\Http\Controllers\HomeController@index',
		'as'	=> 'home',
		]);

	Route::get('/alert', function () {
		return redirect()->route('home')->with('info', 'You have signed up');
	});

//AUTH
	Route::get('/signup', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@getSignup',
			'as'	=> 'auth.signup',
		]);

	Route::post('/signup', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@postSignup',
		]);

	Route::get('/signin', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@getSignin',
			'as'	=> 'auth.signin',
		]);

	Route::post('/signin', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@postSignin',
		]);


});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


    //

