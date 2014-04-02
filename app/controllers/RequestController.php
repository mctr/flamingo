<?php

class RequestController extends BaseController { 
	
	public function newrequest()
	{
		
		$postData = Input::all(); 
		
        $rules = array(
			'full_name' => 'required',
            'email' => 'required',
            'issue' => 'required',
            'content' => 'required'
                
         );
         
         $messages = array(
			'content.required' => 'Lütfen şikayetinizi yazın',
            'full_name.required' => 'Lütfen şikayetinizi yazın',
            'issue.required' => 'Lütfen şikayetinizi yazın',
            'email.required' => 'Lütfen şikayetinizi yazın'
         );
                
         // KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
         $validator = Validator::make($postData, $rules, $messages);

		 // EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
		 if ($validator->fails()) {
			 // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
			 return Redirect::route('/')
					->withInput()
                    ->withErrors($validator->messages());
		 } else {
			 
			 // VERİTABANINA EKLEYELİM
			 $request = new Requests();
             $request->full_name = $postData['full_name'];
             $request->email = $postData['email'];
			 $request->issue = $postData['issue'];
             $request->content = $postData['content'];
             $request->save();
                    
             return Redirect::to('/');
                    
          }    
	}

	public function user_newrequest()
	{
		
		$postData = Input::all(); 
		
        $rules = array(
			'full_name' => 'required',
            'email' => 'required',
            'issue' => 'required',
            'content' => 'required'
                
         );
         
         $messages = array(
			'content.required' => 'Lütfen şikayetinizi yazın',
            'full_name.required' => 'Lütfen isminizi yazın',
            'issue.required' => 'Lütfen konuyu yazın',
            'email.required' => 'Lütfen emailinizi yazın'
         );
                
         // KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
         $validator = Validator::make($postData, $rules, $messages);

		 // EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
		 if ($validator->fails()) {
			 // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
			 return Redirect::to('user/request_complaint')
					->withInput()
                    ->withErrors($validator->messages());
		 } else {

			//{{ Form::hidden('full_name', Auth::user()->first_name) }}
			//			{{ Form::hidden('email', Auth::user()->email) }}


			 // VERİTABANINA EKLEYELİM
			 $request = new Requests();
             $request->full_name = $postData['full_name'];
             $request->email = $postData['email'];
			 $request->issue = $postData['issue'];
             $request->content = $postData['content'];
             $request->save();
                    
             return Redirect::to('user/request_complaint')->with('message', 'İstek | Şikayet "iniz gönderildi');
                    
          }    
	}

}
