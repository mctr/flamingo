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


Route::post('homePage/iletisim', array('as' => 'homePage/iletisim', 'uses' => 'RequestController@newrequest'));

Route::get('admin/login', function() { return View::make('admin.login'); });

Route::post('admin/login', array('as' => 'admin/login', 'uses' => 'AdminController@postLogin'));

Route::get('admin/adminadd', function() { return View::make('admin.adminadd'); });

Route::post('admin/adminadd', array('as' => 'admin/adminadd', 'uses' => 'AdminController@postCreate'));

Route::group(array('before' => 'auth'), function()
{
	Route::get('admin/profile', array('as' => 'admin/profile', 'uses' => 'AdminController@Index'));
	
	Route::get('admin/users', array('as' => 'admin/users', 'uses' => 'AdminController@userListesi'));
	
	Route::get('admin/request', array('as' => 'admin/request', 'uses' => 'AdminController@request'));
	
	Route::get('admin/mizah', array('as' => 'admin/mizah', 'uses' => 'AdminController@mizah'));
	
	Route::get('admin/admins', array('as' => 'admin/admins', 'uses' => 'AdminController@adminListesi'));
	
	Route::get('admin/useronay', array('as' => 'admin/useronay', 'uses' => 'AdminController@onayListesi'));
	
	Route::get('admin/admindetails/{id}', array('as' => 'admindetails', 'uses' => 'AdminController@admindetails'));
	
	Route::get('admin/userdetails/{id}', array('as' => 'userdetails', 'uses' => 'AdminController@userdetails'));
	
	Route::get('admin/onaylama/{id}', array('as' => 'onaylama', 'uses' => 'AdminController@onaylama'));
	
	Route::get('admin/ret/{id}', array('as' => 'ret', 'uses' => 'AdminController@userret'));
	
	Route::get('admin/adminret/{id}', array('as' => 'adminret', 'uses' => 'AdminController@adminret'));
	
	Route::post('admin/adminupdate', array('as' => 'adminupdate', 'uses' => 'AdminController@adminupdate'));
	
	Route::post('admin/userupdate', array('as' => 'admin/userupdate', 'uses' => 'AdminController@userupdate'));
	
	Route::get('admin/userret/{id}', array('as' => 'userret', 'uses' => 'AdminController@userret'));
	
	Route::get('admin/commentdetails/{id}', array('as' => 'commentdetails', 'uses' => 'AdminController@commentdetails'));
	
	Route::post('admin/commentupdate', array('as' => 'admin/commentupdate', 'uses' => 'AdminController@commentupdate'));
	
	Route::post('admin/password_update', array('as' => 'password_update', 'uses' => 'AdminController@password_update'));
	
	Route::post('admin/user_password_update', array('as' => 'user_password_update', 'uses' => 'AdminController@user_password_update'));
	
	Route::get('admin/yorumret/{id}', array('as' => 'yorumret', 'uses' => 'AdminController@yorumret'));
	
	Route::get('admin/fotoret/{id}', array('as' => 'fotoret', 'uses' => 'AdminController@fotoret'));
	
	Route::get('admin/requestret/{id}', array('as' => 'requestret', 'uses' => 'AdminController@requestret'));

	Route::get('admin/logout', array('as' => 'admin/logout', 'uses' => 'AdminController@logout'));
});

Route::get('login', function() { return View::make('user.login'); });
Route::post('login', array('as' => 'login', 'uses' => 'UserController@postLogin'));

Route::get('user/register', function() { return View::make('user.register'); });
Route::post('user/register', array('as' => 'user/register', 'uses' => 'UserController@postCreate'));


Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

Route::group(array('before' => 'auth'), function()
{
	Route::get('user/profile', array('as' => 'user/profile', 'uses' => 'UserController@Index'));

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

	Route::post('user/password_update', array('as' => 'password_update', 'uses' => 'UserController@password_update'));

	Route::get('user/gallery', array('as' => 'gallery', 'uses' => 'PhotoController@gallery'));

	Route::post('user/file_uploads', array('as'=> 'user/file_uploads', 'uses' => 'PhotoController@file_upload'));

	Route::get('user/image_list', array('as'=> 'user/image_list', 'uses' => 'PhotoController@image_list'));

	Route::get('user/image_list/{id}', array('as'=> 'user/image_delete', 'uses' => 'PhotoController@image_delete'));

	Route::get('user/galery/{id}', array('as'=> 'user/profile_pic_change', 'uses' => 'PhotoController@profile_picture_change'));

	Route::get('user/detail/{id}/gallery', array('as' => 'detail/gallery', 'uses' => 'PhotoController@friend_gallery'));

	Route::get('user/request_complaint', function() { return View::make('user.request_complaint'); });

	Route::post('user/request_complaint', array('as' => 'user/request_complaint', 'uses' => 'RequestController@user_newrequest'));

});
