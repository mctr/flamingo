<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function friends()
	{
		$friends = DB::select('select * from users where status = 1 and id != ?', array(Auth::user()->id));

		$profile_pic = DB::Select('select * from images where image_state = 1 or image_state = 3 and user_id != ?', array(Auth::user()->id));

		return View::make('user/friends', compact('friends', 'profile_pic'));
	}

}
