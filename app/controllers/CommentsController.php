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
		$comments = DB::select('select * from comments where user_id = ?', array($id));

		//$who = DB::select('select * from comments where  = ?', array($id));

		//$who = DB::table('users')->whereNull('soy_ismi')->union($ilksorgu)->get();
		//$comments = User::find($id)->yorumlar();
		//$comments = Comment::with('user')->where('id', '=', $id)->get();

		//$comments = Comment::with('user')->where('user_id', '=', $id)->get();



		return View::make('user.yorumlar', compact('user', 'comments', 'who'));
	}

}