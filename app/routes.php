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
	Route::get('user/profile', array('as' => 'user/profile', 'uses' => 'UserController@Index'));

	Route::get('user/yorumyap', function() { return View::make('user.yorumyap'); });

	Route::get('friends', array('as' => 'friends', 'uses' => 'HomeController@friends'));

	Route::get('user/detail/{id}', array('as' => 'detail', 'uses' => 'UserController@detail'));

	Route::get('user/confirm/{id}', array('as' => 'confirm', 'uses' => 'CommentsController@confirm'));

	Route::get('user/update/{id}', array('as' => 'update', 'uses' => 'CommentsController@update'));

	Route::post('user/comment_update', array('as' => 'user/comment_update', 'uses' => 'CommentsController@comment_update'));


	Route::get('user/delete/{id}', array('as' => 'delete', 'uses' => 'CommentsController@delete'));

	Route::post('newComment', array('as' => 'newComment', 'uses' => 'CommentsController@newComment'));

	Route::get('user/{id}/yorumlar', array('as' => 'yorumlar', 'uses' => 'CommentsController@yorumlar'));

	Route::get('user/mycomments', array('as' => 'user/mycomments', 'uses' => 'UserController@mycomments'));

	Route::get('user/confirm_waiting', array('as' => 'user/confirm_waiting', 'uses' => 'UserController@confirm_waiting'));

	Route::get('user/confirmed_comments', array('as' => 'user/confirmed_comments', 'uses' => 'CommentsController@confirmed_comment'));	

	Route::get('user/information', function() { return View::make('user.personal_information'); });

	Route::post('user/information_update', array('as' => 'information_update', 'uses' => 'UserController@information_update'));

});