<?php

class PhotoController extends BaseController {

	public function gallery()
	{
		$images = DB::select('select * from images where user_id = ?', array(Auth::user()->id));

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
		   return Redirect::back();
		} else {
		   return Redirect::back()->withErrors($validate)->withInput();
		}

	}

}