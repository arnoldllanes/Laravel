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
			'middleware' => ['guest'],
		]);

	Route::post('/signup', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@postSignup',
			'middleware' => ['guest'],
		]);

	Route::get('/signin', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@getSignin',
			'as'	=> 'auth.signin',
			'middleware' => ['guest'],

		]);

	Route::post('/signin', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@postSignin',
			'middleware' => ['guest'],
		]);

	Route::get('/signout', [
			'uses'	=> '\Chatty\Http\Controllers\AuthController@getSignout',
			'as'	=> 'auth.signout',
		]);

//SEARCH
	Route::get('/search', [
			'uses'	=> '\Chatty\Http\Controllers\SearchController@getResults',
			'as'	=> 'search.results',
		]);

//USER PROFILE
	Route::get('/user/{username}', [
			'uses'	=> '\Chatty\Http\Controllers\ProfileController@getProfile',
			'as'	=> 'profile.index',

		]);

	Route::get('/profile.edit', [
			'uses'	=> '\Chatty\Http\Controllers\ProfileController@getEdit',
			'as'	=> 'profile.edit',
			//IF THE USER IS NOT LOGGED IN THEY WONT BE ABLE TO ACCESS IT NOTICE [AUTH]
			'middleware' => ['auth'],
		]);

	Route::post('/profile.edit', [
			'uses'	=> '\Chatty\Http\Controllers\ProfileController@postEdit',
			'as'	=> 'profile.edit',
			'middleware' => ['auth'],
		]);

//FRIENDS
	Route::get('/friends', [
			'uses'	=> '\Chatty\Http\Controllers\FriendController@getIndex',
			'as'	=> 'friend.index',
			'middleware' => ['auth'],
		]);

	Route::get('/friends/add/{username}', [
			'uses'	=> '\Chatty\Http\Controllers\FriendController@getAdd',
			'as'	=> 'friend.add',
			'middleware' => ['auth'],
		]);

	Route::get('/friends/accept/{username}', [
			'uses'	=> '\Chatty\Http\Controllers\FriendController@getAccept',
			'as'	=> 'friend.accept',
			'middleware' => ['auth'],
		]);

	Route::post('/friends/delete/{username}', [
			'uses'	=> '\Chatty\Http\Controllers\FriendController@postDelete',
			'as'	=> 'friend.delete',
			'middleware' => ['auth'],
		]);

//STATUSES
	Route::post('/status', [
			'uses'	=> '\Chatty\Http\Controllers\StatusController@postStatus',
			'as'	=> 'status.post',
			'middleware' => ['auth'],
		]);

	Route::post('/status/{statusId}/reply', [
			'uses'	=> '\Chatty\Http\Controllers\StatusController@postReply',
			'as'	=> 'status.reply',
			'middleware' => ['auth'],
		]);

	Route::get('/status/{statusId}/like', [
			'uses'	=> '\Chatty\Http\Controllers\StatusController@getLike',
			'as'	=> 'status.like',
			'middleware' => ['auth'],

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

