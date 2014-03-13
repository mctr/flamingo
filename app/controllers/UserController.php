<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

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
            return Redirect::route('login')
                    ->withInput()
                    ->withErrors($v->messages());
		} else {

			// BÖYLE BİR ÜYE OLUP OLMADIĞINI KONTROL EDELİM
            if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'], 'status' => '2' ))) {
                   
                // OTURUM AÇILDIĞINA GÖRE KULLANICIYI YÖNLENDİRELİM
                return Redirect::to('user/profile');
                        
            } else {
                        
                // GİRİLEN BİLGİLER HATALI MESAJINI VERELİM
                return Redirect::route('login')
                        ->withInput()
                        ->withErrors(array('Girdiğiniz mail adresi veya şifre hatalı!'));     
            }
                    
        }
	}

	public function postCreate() {

		// POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
                $postData = Input::all();
                
                // FORM KONTROLLERİNİ BELİRLEYELİM
                $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|confirmed',
                'password_confirmation' => 'required',
                'student_number' => 'required|unique:users',
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
                'email.unique' => 'Bu mail adresi zaten kullanılıyor. Lütfen başka bir mail adresi yazın',
                'password.required' => 'Lütfen şifrenizi yazın',
                'password.min' => 'Şifreniz minumum 4 karakterden oluşmalıdır',
                'password.confirmed' => 'Girdiğiniz şifreler birbiriyle eşleşmiyor',
                'password_confirmation.required' => 'Lütfen şifrenizi doğrulayın',
                'student_number.required' => 'Lütfen ögrenci numaranızı yazın',
                'student_number.unique' => 'Bu ögrenci numarası zaten kullanılıyor.Lütfen başka bir ögrenci numarası yazın',
                'gender.required' => 'Lütfen cinsiyetinizi yazın',
                'faculty_name.required' => 'Lütfen fakültenizi yazın',
                'department_name.required' => 'Lütfen bölümünüzü yazın'
                );
                
                // KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
                $validator = Validator::make($postData, $rules, $messages);

                // EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
                if ($validator->fails()) {
                    
                    // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
                    return Redirect::route('user/register')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
                } else {
                    
                    // ÜYEYİ KAYIT EDELİM
                    $user = User::create(array(
                    	'first_name' => $postData['first_name'],
                    	'last_name' => $postData['last_name'],
                    	'email' => $postData['email'],
                    	'password' => Hash::make($postData['password']),
                    	'student_number' => $postData['student_number'],
                    	'faculty_name' => $postData['faculty_name'],
                    	'department_name' => $postData['department_name'],
                    	'birthday' => $postData['birthday'],
                    	'phone_number' => $postData['phone_number'],
                    	'status' => '2',
                    	'gender' => $postData['gender']
                    ));
                    
                    // KAYIT SAYFASINA YÖNLENDİRELİM
                    return Redirect::to('user/register')->with('message', 'Kaydınız Admin onayına gönderilmiştir');
                    
                }
	}

	public function information_update()
	{
		// POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
                $input = Input::all();
                
                // FORM KONTROLLERİNİ BELİRLEYELİM
                $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email',
                'student_number' => 'required|integer',
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
                'student_number.required' => 'Lütfen ögrenci numaranızı yazın',
                'student_number.integer' => 'Ögrenci numaranız sayılardan oluşmalıdır',
                'gender.required' => 'Lütfen cinsiyetinizi yazın',
                'faculty_name.required' => 'Lütfen fakültenizi yazın',
                'department_name.required' => 'Lütfen bölümünüzü yazın'
                );
                
                // KONTROL (VALIDATION) İŞLEMİNİ GERÇEKLEŞTİRELİM
                $validator = Validator::make($input, $rules, $messages);

                // EĞER VALİDASYON BAŞARISIZ OLURSA HATALARI GÖSTERELİM
                if ($validator->fails()) {
                    
                    // HATA MESAJLARI VE INPUT DEĞERLERİYLE FORMA  YÖNLENDİRELİM
                    return Redirect::to('user/information')
                            ->withInput()
                            ->withErrors($validator->messages());
                    
                } else {
                    
                    $user = User::find(Auth::user()->id);
                    $user->email = $input['email'];
                    $user->first_name = $input['first_name'];
                    $user->last_name = $input['last_name'];
                    $user->birthday = $input['birthday'];
                    $user->phone_number = $input['phone_number'];
                    $user->gender = $input['gender'];
                    $user->faculty_name = $input['faculty_name'];
                    $user->department_name = $input['department_name'];
                    $user->student_number = $input['student_number'];
                    $user->save();

                    // KAYIT SAYFASINA YÖNLENDİRELİM
                    return Redirect::to('user/information')->with('message', 'Bilgileriniz Güncellenmiştir');
                    
                }

	}

	public function Index()
	{
		$confirmed = DB::select('select * from comments where user_id = ? and state = 1', array(Auth::user()->id));

    	$mycomments = DB::select('select * from comments where user_id = ? and state = 2', array(Auth::user()->id));

    	return View::make('user.profile', compact('confirmed', 'mycomments'));
	}

	public function logout()
    {
        // OTURUMU SONLANDIRALIM
        Auth::logout();
            
        // KULLANICIYI SORULAR SAYFASINA YÖNLENDİRELİM
        return Redirect::route('login');
    }

    public function detail($id)
    {
    	$user = User::find($id);

    	return View::make('user.personalpage', compact('user'));
    }

    public function mycomments()
    {
    	$mycomments = DB::select('select * from comments where user_id = ? and state = 1', array(Auth::user()->id));

    	return View::make('user.mycomments', compact('mycomments'));
    }

    public function confirm_waiting()
    {
    	$confirmed = DB::select('select * from comments where user_id = ? and state = 1', array(Auth::user()->id));

    	$mycomments = DB::select('select * from comments where user_id = ? and state = 2', array(Auth::user()->id));
    	
    	return View::make('user.confirm_waiting', compact('mycomments', 'confirmed'));
    }

}
