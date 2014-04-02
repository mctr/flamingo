<?php

//use Auth, BackendController, Form, Input, Redirect, Sentry, View;

class AdminController extends BaseController {
	
	public function postLogin() 
	{
		
		$input = Input::all();

		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
			);

		$messages = array(
                'email.required' => 'Lütfen mail adresinizi yazın',
                'email.email' => 'Lütfen geçerli bir mail adresi yazın',
                'password.required' => 'Lütfen şifrenizi yazın'
                );

		$v = Validator::make($input, $rules, $messages);

		if($v->fails()) {
			// HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
            return Redirect::route('admin/login')
                    ->withInput()
                    ->withErrors($v->messages());
		} else {

			// BÖYLE BİR ÜYE OLUP OLMADIĞINI KONTROL EDELİM
           if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'], 'status' => '3' ))) {
			   
			   return Redirect::to('admin/profile');
            
            } else {
                        
                // GİRİLEN BİLGİLER HATALI MESAJINI VERELİM
                return Redirect::route('admin/login')
                        ->withInput()
                        ->withErrors(array('Girdiğiniz mail adresi veya şifre hatalı!'));     
            }         
        }
	}
	
	public function postCreate() {
		
		$postData = Input::all();
		// FORM KONTROLLERİNİ BELİRLEYELİM
		
		$rules = array(
			'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
        );
                
		// HATA MESAJLARINI OLUŞTURALIM
		$messages = array(
			'first_name.required' => 'Lütfen ilk adınızı yazın',
            'first_name.min' => 'İlk adınız en az 3 karakterden oluşmalıdır',
            'last_name.required' => 'Lütfen soyadınızı yazın',
            'last_name.min' => 'Soyadınız en az 3 karakterden oluşmalıdır',
            'email.required' => 'Lütfen mail adresinizi yazın',
            'email.email' => 'Lütfen geçerli bir mail adresi yazın',
            'password.required' => 'Lütfen şifrenizi yazın',
            'password.min' => 'Şifreniz minumum 4 karakterden oluşmalıdır',
            'password.confirmed' => 'Girdiğiniz şifreler birbiriyle eşleşmiyor',
            'password_confirmation.required' => 'Lütfen şifrenizi doğrulayın'

        );
                
		// KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
		$validator = Validator::make($postData, $rules, $messages);

		// EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
		if ($validator->fails()) {
			// HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
			return Redirect::route('admin/adminadd')
							->withInput()
                            ->withErrors($validator->messages());
                    
		} else {
			// ADMİN KAYIT EDELİM
			$admin = new User();
			$admin->first_name = $postData['first_name'];
			$admin->last_name = $postData['last_name'];
			$admin->email = $postData['email'];
			$admin->password = Hash::make($postData['password']);
			$admin->status = '3';
			$admin->save();
			// KAYIT SAYFASINA YÖNLENDİRELİM

			return Redirect::to('admin/adminadd')->with('message', 'Kaydınız Tamamlanmıştır.');
		}
	}
	
	public function logout() 
	{
		
        // OTURUMU SONLANDIRALIM
        Auth::logout();
            
        // KULLANICIYI SORULAR SAYFASINA YÖNLENDİRELİM
        return Redirect::route('admin/login');
    }
    
    // GÜNCELLEME İŞLEMLERİ
    public function adminupdate() 
    {
		
		// POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
		$input = Input::all();
                
		// FORM KONTROLLERİNİ BELİRLEYELİM
		$rules = array(
			'first_name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required|email'
		);
                
		// HATA MESAJLARINI OLUŞTURALIM
		$messages = array(
			'first_name.required' => 'Lütfen ilk adınızı yazın',
			'first_name.min' => 'İlk adınız en az 3 karakterden oluşmalıdır',
			'last_name.required' => 'Lütfen soyadınızı yazın',
			'last_name.min' => 'Soyadınız en az 3 karakterden oluşmalıdır',
			'email.required' => 'Lütfen mail adresinizi yazın',
			'email.email' => 'Lütfen geçerli bir mail adresi yazın'
		);
		
		// KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
		$validator = Validator::make($input, $rules, $messages);

		// EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
		if ($validator->fails()) {
			// HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
			return Redirect::to('admin/admins')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
		} else {
			
			DB::table('users')->where('id', $input['id'])->update(array(
										'email' => $input['email'],
										'first_name' => $input['first_name'],
										'last_name' => $input['last_name']
										));
										
			return Redirect::to('admin/admins')->with('message', 'Bilgiler Güncellenmiştir!');
                    
		}             
	}
	
	public function userupdate() 
	{
		
		$postData = Input::all();
                
		// FORM KONTROLLERİNİ BELİRLEYELİM
		$rules = array(
			'first_name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required',
			'student_number' => 'required',
			'gender' => 'required',
			'faculty_name' => 'required',
			'department_name' => 'required'
		);
                
		// HATA MESAJLARINI OLUŞTURALIM
		$messages = array(
			'first_name.required' => 'Lütfen ilk adınızı yazın',
			'first_name.min' => 'İlk adınız en az 3 karakterden oluşmalıdır',
			'last_name.required' => 'Lütfen soyadınızı yazın',
			'last_name.min' => 'Soyadınız en az 3 karakterden oluşmalıdır',
			'email.required' => 'Lütfen mail adresinizi yazın',
			'email.email' => 'Lütfen geçerli bir mail adresi yazın',
			'gender.required' => 'Lütfen cinsiyetinizi yazın',
			'faculty_name.required' => 'Lütfen fakültenizi yazın',
			'department_name.required' => 'Lütfen bölümünüzü yazın'
		);
		
		// KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
		$validator = Validator::make($postData, $rules, $messages);

		// EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
		if ($validator->fails()) {
			// HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
			return Redirect::route('admin/users')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
		} else {
			DB::table('users')
				->where('id', $postData['id'])
				->update(array(
					'first_name' => $postData['first_name'],
					'last_name' => $postData['last_name'],
					'email' => $postData['email'],
					'student_number' => $postData['student_number'],
					'faculty_name' => $postData['faculty_name'],
					'department_name' => $postData['department_name'],
					'birthday' => $postData['birthday'],
					'phone_number' => $postData['phone_number'],
					'gender' => $postData['gender']
				));
			// KAYIT SAYFASINA YÖNLENDİRELİM
			return Redirect::to('admin/users')->with('message', 'Bilgiler Güncellenmiştir!');
		}	
	}
	
	public function commentupdate() 
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
			return Redirect::to('admin/users')->with('message', 'Bilgiler Güncellenmiştir!');;
		}
		
	}
	
	public function password_update() 
	{
		
		$input = Input::all();
		 // FORM KONTROLLERİNİ BELİRLEYELİM
        $rules = array(
        	'old_password' => 'required',
        	'password' => 'required|confirmed',
        	'password_confirmation' => 'required'       
        	);

        $messages = array(
        	'old_password.required' => 'Lütfen eski parolanızı yazın',
        	'password.required' => 'Lütfen yeni parolanızı yazın',
        	'password_confirmation.required' => 'Lütfen yeni parolanızı dogrulayın',
        	'password.confirmed' => 'Girdiginiz yeni şifreler eşleşmiyor'
        	);

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
                    
            // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
            return Redirect::to('admin/admins')->withInput()->withErrors($validator->messages());
                    
        } else {
			$admin = DB::select('select * from users where id = ?', array($input['id']));
			
			foreach ($admin as $admins) {
				
				if (Hash::check($input['old_password'], $admins->password)) {
					
					$user = User::findOrFail($admins->id);
					$user->password = Hash::make($input['password']);
					$user->save();

					return Redirect::to('admin/admins')->with('message', 'Parolanızı degiştirdiniz !');
					
				} else {
					
					return Redirect::to('admin/admins')->with('message', 'Parolanızı yanlış giriyorsunuz!');
				}
			}
		}
	}
	
	public function user_password_update()
	{
		$input = Input::all();
		 // FORM KONTROLLERİNİ BELİRLEYELİM
        $rules = array(
			'password' => 'required|confirmed',
        	'password_confirmation' => 'required'       
        	);

        $messages = array(
        	'password.required' => 'Lütfen yeni parolanızı yazın',
        	'password_confirmation.required' => 'Lütfen yeni parolanızı dogrulayın',
        	'password.confirmed' => 'Girdiginiz yeni şifreler eşleşmiyor'
        	);

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
                    
            // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
            return Redirect::to('admin/users')->withInput()->withErrors($validator->messages());
                    
        } else {
			// SORUYU VERİTABANINDA GÜNCELLEYELİM
            DB::table('users')->where('id', $input['id'])->update(array('password' => Hash::make($input['password'])));
			
			// KULLANICIYI YÖNLENDİRELİM
			return Redirect::to('admin/users')->with('message', 'Parolanız  Güncellenmiştir!');;
		}
		
		
	}
	
	// ONAYLAMA 
	public function onaylama($id) 
	{
		
		DB::table('users')->where('id', $id)->update(array('status' => '1'));

		$picture = new Photo();

		$picture->user_id = $id;
		$picture->image_path = 'assets/img/user_man.jpg';
		$picture->image_state = '3';

		$picture->save();
		
		return Redirect::to('admin/useronay');
	}
	
	// SİLME İŞLEMLERİ
	public function userret($id) 
	{
		
		$benimyorumlarim = DB::select('select * from comments where user_id = ?', array($id));
		
		foreach ($benimyorumlarim as $yorum) {
				
			DB::table('comments')->where('id', $yorum->id)->delete();
		}
		
		$fotolar = DB::select('select * from images where user_id = ?', array($id));

		foreach ($fotolar as $foto) {
				
			DB::table('images')->where('id', $foto->id)->delete();
		}

		$yorumlar = DB::select('select * from comments where who_did_id = ?', array($id));
		
		foreach ($yorumlar as $yorum) {
				
			DB::table('comments')->where('id', $yorum->id)->delete();
		}
		
		DB::table('users')->where('id', $id)->delete();
		
		return Redirect::to('admin/users');
	}
	
	public function adminret($id)
	{
		
		DB::table('users')->where('id', $id)->delete();
		
		return Redirect::to('admin/admins')->with('message', 'Admin Silindi!');
	}
	
	public function yorumret($id) 
	{
		
		DB::table('comments')->where('id', $id)->delete();
		
		return Redirect::to('admin/users')->with('message', 'Yorum Silindi!');
	}
	
	public function fotoret($id) 
	{
				
		DB::table('images')->where('id', $id)->delete();
		
		return Redirect::to('admin/users')->with('message', 'Fotoğraf Silindi!');
	}
	
	public function requestret($id) 
	{
				
		DB::table('requests')->where('id', $id)->delete();
		
		return Redirect::to('admin/profile')->with('message', 'Şikayet Silindi!');
	}
	
	
    // DETAY İŞLEMLERİ BURADA GERÇEKLEŞTİ
    public function commentdetails($id) 
    {
		
		$yorumlar = DB::select('select * from comments where id = ?', array($id));
		
		foreach ($yorumlar as $yorum) {
				
			 $id = $yorum->id;
			 $comment = $yorum->comment;

		}
		
		return View::make('admin.comment_page', compact('comment', 'id'));
    }
    
    public function admindetails($id) 
    {
		
		$adminler = DB::select('select * from users where status = 3 and id = ?', array($id));
		
		foreach ($adminler as $admin) {	
			
			 $id = $admin->id;
			 $firstname = $admin->first_name;
			 $lastname = $admin->last_name;
			 $mail = $admin->email;
		}
		
		return View::make('admin.admin_page', compact('firstname', 'lastname', 'mail', 'id'));
    }
    
    public function userdetails($id) 
    {
		
		// KİŞİSEL BİLGİLERİ ÇEKTİK
		
		$uyeler = DB::select('select * from users where status = 1 and id = ?', array($id));
		
		foreach ($uyeler as $uye) {
			$firstname = $uye->first_name;
			$lastname = $uye->last_name;
			$phone_number = $uye->phone_number;
			$birthday = $uye->birthday;
			$gender = $uye->gender;
			$faculty_name = $uye->faculty_name;
			$department_name = $uye->department_name;
			$student_number = $uye->student_number;
			$email = $uye->email;
		}
		
		// FOTOLAR ÇEKİLDİ
		$fotolar = DB::select('select * from images where user_id = ?', array($id));
		
		// KİŞİYE YAPILAN YORUMLARI ÇEKECEZ
		$who_id = 0;
		$yorumlar = DB::select('select * from comments where user_id = ?', array($id));
		
		foreach ($yorumlar as $yorum) {
			
			$who_id = $yorum->who_did_id;
		
		}
	
		$yorumyapan = DB::select('select * from users where status = 1 and id = ?',array($who_id));
		
		foreach ($yorumyapan as $yorumad) {
			$fname = $yorumad->first_name;
			$lname = $yorumad->last_name;
		}

		$yorumlarim = DB::select('select * from comments where user_id = ? and state = 1', array($id));
		
		return View::make('admin.user_page', compact('firstname', 'lastname', 'email', 'phone_number', 'birthday',
							'gender', 'faculty_name', 'department_name', 'student_number', 'fname', 'lname','yorumlarim', 'id', 'fotolar'));
	
    }
    
    // LİSTELEME İŞLEMLERİ BURADA GERÇEKLEŞTİ HEADERS TANIMLANMASI
    public function Index() 
    {
		
		$useronay = DB::select('select * from users where status = 2');
		$admins = DB::select('select * from users where status = 3');
		$users = DB::select('select * from users where status = 1');
		$request = DB::select('select * from requests');
		
    	return View::make('admin.profile', compact('useronay', 'admins', 'users', 'request'));
	}
	
    public function adminListesi() {
			
		$useronay = DB::select('select * from users where status = 2');
		$admins = DB::select('select * from users where status = 3');
		$users = DB::select('select * from users where status = 1');
		$request = DB::select('select * from requests');
		
		return View::make('admin.admins', compact('admins', 'useronay', 'users', 'request'));

	}
	
	public function onayListesi() 
	{
		
		$useronay = DB::select('select * from users where status = 2');
		$admins = DB::select('select * from users where status = 3');
		$users = DB::select('select * from users where status = 1');
		$request = DB::select('select * from requests');
		
		return View::make('admin.useronay', compact('useronay', 'admins', 'users', 'request'));
	}
	
	public function userListesi() 
	{
		
		$useronay = DB::select('select * from users where status = 2');
		$admins = DB::select('select * from users where status = 3');
		$users = DB::select('select * from users where status = 1');
		$request = DB::select('select * from requests');
		
		return View::make('admin.users', compact('users', 'admins', 'useronay', 'request'));
	}
	
	public function mizah() 
	{
		
		$useronay = DB::select('select * from users where status = 2');
		$admins = DB::select('select * from users where status = 3');
		$users = DB::select('select * from users where status = 1');
		$request = DB::select('select * from requests');
		
		return View::make('admin.mizah', compact('users', 'admins', 'useronay', 'request'));
	}

}
