<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
    	'id'	   => '1122334455',
        'name'     => 'Chris Sevilleja',
        'username' => 'sevilayha',
        'email'    => '1122334455@student.mmu.edu.my',
        'password' => Hash::make('123456'),
    ));
}

}
