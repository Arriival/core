<?php

use Illuminate\Database\Seeder;

class BasePersonSeeder extends Seeder
{

    public function run()
    {
//        DB::table('users')->delete();
        $person = ['firstName' => 'محمد', 'lastName' => 'لامی', 'code' => '199', 'gender' => 1, 'isActive' => 1, 'email'=>'behzad_dez@gmail', 'phoneNumber'=>'0912125486', 'image'=>'010101010'];
        \App\BasePerson::create($person);
    }
}
