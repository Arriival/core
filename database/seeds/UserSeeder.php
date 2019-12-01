<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = ["id" => 1, "person_id" => 1, "username" => "admin", "password" => "admin", "created_at" => "2019-11-11 10:47:43", "updated_at" => "2019-11-11 10:47:43", "expire_date" => "2019-11-12", "status" => 1];
        \App\User::create($user);
    }
}
