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

}
