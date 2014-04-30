<?php

class HumourController extends BaseController {

	public function Index()
	{
		$my_humour = DB::select('select * from humours where user_id = ?', array(Auth::user()->id));

		$other_humour = DB::select('select * from humours where state = 1');

    	return View::make('user.humour', compact('my_humour', 'other_humour'));
    }

	public function new_humour()
	{
		$input = Input::all();

		if ($input['image']) {
			
			$rules = [
		    'image'     => 'required|image',
			];
		} else {

			$rules = [
			'humour_content' => 'required',
			];
		}

		$messages = array(
        	//'humour_content.required' => 'Lütfen mizah için bişeyler yazın'
        );

        $validate = Validator::make($input, $rules, $messages);

        if ($validate->fails()) {
                    
                    // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
            return Redirect::back()
            	->withInput()
            	->withErrors($validate->messages());
                    
        } else {

        	if($input['image']) {
        		$file = Input::file('image');

		   		$destinationPath    = 'uploads/humours'; //URL::to_asset('uploads/humours/'); //public_path().'/uploads/images/'; // The destination were you store the image.
		   		$filename           = $file->getClientOriginalName(); // Original file name that the end user used for it.
		   		$mime_type          = $file->getMimeType(); // Gets this example image/png
		   		$extension          = $file->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
		   		$upload_success     = $file->move($destinationPath, $filename); // Now we move the file to its new home.
		   	}

		   	$humour = new Humour();

		   	$humour->user_id = Auth::user()->id;
		   	$humour->humour_content = e(trim($input['humour_content']));
		   	if($input['image']) {
		   		$humour->image_path = ''.$destinationPath.'/'.$filename;
			}
		   	$humour->save();

		   	return Redirect::route('user/humour')->with('message', 'Mizah Admin onayına gönderildi');
        }
	}


}