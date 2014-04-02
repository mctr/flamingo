<?php

class PhotoController extends BaseController {

	public function gallery()
	{
		$images = DB::select('select * from images where image_state != 3 and user_id = ?', array(Auth::user()->id));

		return View::make('user.gallery', compact('images'));
	}

	public function file_upload()
	{
		$input = Input::all();

		$rules = [
		    'image'     => 'required|image',
		];

		$messages = [];

		$validate = Validator::make($input, $rules, $messages);
		
		if ($validate->passes()) {

		   // Get the image input
			$file = Input::file('image');

		   $destinationPath    = 'uploads/images'; //URL::to_asset('uploads/images/'); //public_path().'/uploads/images/'; // The destination were you store the image.
		   $filename           = $file->getClientOriginalName(); // Original file name that the end user used for it.
		   $mime_type          = $file->getMimeType(); // Gets this example image/png
		   $extension          = $file->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
		   $upload_success     = $file->move($destinationPath, $filename); // Now we move the file to its new home.

		   // This is were you would store the image path in a table

		   $image = new Photo;

		   $image->user_id = Auth::user()->id;
		   $image->image_path = ''.$destinationPath.'/'.$filename;
		   $image->image_state = '0';

		   $image->save();

		   // You don't need the Redirect to make the image upload work it's just here for example only
		   return Redirect::back()->with('message', 'Başarıli bir şekilde Fotograf yüklediniz');
		} else {
		   return Redirect::back()->withErrors($validate)->withInput();
		}

	}

	public function image_list()
	{
		$images = DB::select('select * from images where user_id = ? and image_state != 3', array(Auth::user()->id));


		return View::make('user.images_list', compact('images'));
	}

	public function image_delete($id)
	{
		$photo = Photo::find($id);

		File::delete($photo->image_path);

		$photo->delete();

		return Redirect::to('user/image_list')->with('message', 'Başarılı bir şekilde fotografı sildiniz');
	}

	public function profile_picture_change($id)
	{
		$profile_images = DB::select('select * from images where image_state = 1 and user_id = ?', array(Auth::user()->id));

		foreach($profile_images as $profile_image)
    	{
    		$pic = Photo::find($profile_image->id);
    		$pic->image_state = '0';
    		$pic->save();
    		//$profile_image->image_state = '0';
    		//$profile_image->save();
    	}

    	$old_profile_pic = $profile_images = DB::select('select * from images where image_state = 3 and user_id = ?', array(Auth::user()->id));

    	foreach($old_profile_pic as $old)
    	{
    		$pic = Photo::find($old->id);
    		$pic->delete();
    	}

    	$new_picture = Photo::find($id);

    	$new_picture->image_state = '1';

    	$new_picture->save();

    	return Redirect::to('user/image_list')->with('message', 'Başarılı bir şekilde Profil resminizi degiştirdiniz');
	}

	public function friend_gallery($id)
	{
		$user = User::find($id);

		$images = DB::select('select * from images where image_state != 3 and user_id = ?', array($id));

		$profile_images = DB::select('select * from images where image_state = 1 and user_id = ?', array($id));

		if (!$profile_images) {
    		$profile_images = DB::select('select * from images where image_state = 3 and user_id = ?', array($id));
    	}

		return View::make('user.friend_gallery', compact('user', 'images', 'profile_images'));

	}

}