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

Route::get('/', function()
{
	return View::make('homePage.layout');
});

/*Route::get('login', function()
{
	return View::make('homePage.signin');
});*/

Route::get('login', function() { return View::make('user.login'); });
Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));

Route::get('user/register', function() { return View::make('user.register'); });
Route::post('user/register', array('as' => 'user/register', 'uses' => 'UserController@postCreate'));


Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

Route::group(array('before' => 'auth'), function()
{
	Route::get('user/profile', function() {	return View::make('user.profile'); });

	Route::get('user/yorumyap', function() { return View::make('user.yorumyap'); });

	Route::get('friends', array('as' => 'friends', 'uses' => 'HomeController@friends'));

	Route::get('user/detail/{id}', array('as' => 'detail', 'uses' => 'UserController@detail'));

	Route::post('newComment', array('as' => 'newComment', 'uses' => 'CommentsController@newComment'));

	Route::get('user/{id}/yorumlar', array('as' => 'yorumlar', 'uses' => 'CommentsController@yorumlar'));

	Route::get('user/mycomments', array('as' => 'user/mycomments', 'uses' => 'UserController@mycomments'));

});