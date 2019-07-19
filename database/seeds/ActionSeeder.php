<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{

    public function run()
    {
        $personnel = ['id' => 1, 'parent_id' => null, 'title' => 'اطلاعات افراد', 'icon' => 'fa fa-users', 'route' => 'personnel', 'order' => 2, 'code' => '1'];
        $dashboard = ['id' => 2, 'parent_id' => null, 'title' => 'داشبورد', 'icon' => 'fa fa-home', 'route' => 'home', 'order' => 1, 'code' => '2'];
        $users = ['id' => 4, 'parent_id' => null, 'title' => 'مدیریت سیستم', 'icon' => 'fa fa-cogs', 'route' => '#', 'order' => 3, 'code' => '4'];
        $setting = ['id' => 3, 'parent_id' => 4, 'title' => 'کاربران', 'icon' => '', 'route' => 'user', 'order' => 1, 'code' => '3'];
        $role = ['id' => 5, 'parent_id' => 4, 'title' => 'گروه های کاربری', 'icon' => '', 'route' => 'role', 'order' => 2, 'code' => '5'];
        \App\Action::create($personnel);
        \App\Action::create($dashboard);
        \App\Action::create($users);
        \App\Action::create($setting);
        \App\Action::create($role);
    }
}
