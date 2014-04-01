<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // !!! All existing users are deleted !!!
        //DB::table('users')->delete();

        User::create(array(
            'first_name'  => 'Mesut',
            'last_name'  => 'Çittir',
            'password'  => Hash::make('12345'),
            'email'     => 'mesut.cittir@bil.omu.edu.tr',
            'student_number'  => '10060318',
            'phone_number'   =>  '05316294997',
            'gender'     =>  'Erkek',
            'faculty_name'  =>  'Mühendislik Fakültesi',
            'department_name'  =>  'Bilgisayar Mühendisligi'
        ));

        User::create(array(
            'first_name'  => 'Muhammet',
            'last_name'  => 'Enginar',
            'password'  => Hash::make('12345'),
            'email'     => 'muhammet.enginar@bil.omu.edu.tr',
            'student_number'  => '10060294',
            'phone_number'   =>  '05059647854',
            'gender'     =>  'Erkek',
            'faculty_name'  =>  'Mühendislik Fakültesi',
            'department_name'  =>  'Bilgisayar Mühendisligi'
        ));

        User::create(array(
            'first_name'  => 'Koray',
            'last_name'  => 'Tahta',
            'password'  => Hash::make('12345'),
            'email'     => 'koray.tahta@bil.omu.edu.tr',
            'student_number'  => '10060314',
            'phone_number'   =>  '05365438975',
            'gender'     =>  'Erkek',
            'faculty_name'  =>  'Mühendislik Fakültesi',
            'department_name'  =>  'Bilgisayar Mühendisligi'
        ));
        
        User::create(array(
            'first_name'  => 'Admin',
            'last_name'  => 'Admin',
            'password'  => Hash::make('12345'),
            'email'     => 'admin@admin.com',
            'status'	=> '3',
        ));
    }
}
