<?php

class CommentsController extends BaseController {

	public function newComment()
	{
				// POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
                $postData = Input::all();
                
                // FORM KONTROLLERİNİ BELİRLEYELİM
                $rules = array(
                'content' => 'required'
                );
                
                // HATA MESAJLARINI OLUŞTURALIM
                $messages = array(
                'content.required' => 'Lütfen yorumunuzu yazın'
                );
                
                // KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
                $validator = Validator::make($postData, $rules, $messages);

                // EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
                if ($validator->fails()) {
                    
                    // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
                    return Redirect::route('detail')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
                } else {
                    
                    // SORUYU VERİTABANINA EKLEYELİM
                    $comment = new Comment();
                    $comment->user_id = $postData['yorum_yapilan'];
                    $comment->who_did_id = Auth::user()->id;
                    $comment->comment = e(trim($postData['content']));
                    $comment->state = '2';
                    $comment->save();
                    
                    // KULLANICIYI SORULARIN LİSTELENDİĞİ SAYFAYA YÖNLENDİRELİM
                    return Redirect::to('user/profile');
                    
                }
	}

	public function yorumlar($id)
	{
		$user = User::find($id);

		/*$who = DB::table('users')
						->join('comments', 'users.id', '=', 'comments.who_did_id')
						->select('users.first_name', 'users.last_name');
		*/
		$comments = DB::select('select * from comments where user_id = ? and state = 1', array($id));

		//$who = DB::select('select * from comments where  = ?', array($id));

		//$who = DB::table('users')->whereNull('soy_ismi')->union($ilksorgu)->get();
		//$comments = User::find($id)->yorumlar();
		//$comments = Comment::with('user')->where('id', '=', $id)->get();

		//$comments = Comment::with('user')->where('user_id', '=', $id)->get();

		$profile_images = DB::select('select * from images where image_state = 1 and user_id = ?', array($id));

		if (!$profile_images) {
    		$profile_images = DB::select('select * from images where image_state = 3 and user_id = ?', array($id));
    	}


		return View::make('user.yorumlar', compact('user', 'comments', 'profile_images'));
	}

	public function confirm($id)
	{

		DB::table('comments')->where('id', $id)->update(array('state' => '1'));

		return Redirect::to('user/confirm_waiting');

	}

	public function update($id)
	{
		$guncelle = DB::select('select * from comments where id = ?', array($id));

		//DB::table('comments')->where('id', $id)->update(array(''));
		return View::make('user.update', compact('guncelle'));
	}

	public function comment_update()
	{
		$input = Input::all();

		$rules = array(
            'content' => 'required'
        );

        $messages = array(
            'content.required' => 'Lütfen yorumunuzu yazın'
   	    );

   	    $validator = Validator::make($input, $rules, $messages);

   	    if ($validator->fails()) {
                    
                    // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
                    return Redirect::route('update')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
                } else {
                    
                    // SORUYU VERİTABANINDA GÜNCELLEYELİM
                	DB::table('comments')->where('id', $input['id'])->update(array('comment' => $input['content'], 'state' => '1'));
                    
                    // KULLANICIYI YÖNLENDİRELİM
                    return Redirect::to('user/confirm_waiting');
                    
                }

		

		Redirect::to('user/confirm_waiting');
	}

	public function delete($id)
	{
		DB::table('comments')->where('id', $id)->delete();
		return Redirect::to('user/confirm_waiting');
	}

	public function confirmed_comment()
	{
		$confirmed = DB::select('select * from comments where user_id = ? and state = 1', array(Auth::user()->id));

    	$mycomments = DB::select('select * from comments where user_id = ? and state = 2', array(Auth::user()->id));
    	
    	return View::make('user.confirmed_comment', compact('mycomments', 'confirmed'));
	}

}