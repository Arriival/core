<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{

    public function run()
    {
        $dashboard = ['id' => 2, 'parent_id' => null, 'title' => 'داشبورد', 'icon' => 'fa fa-home', 'route' => 'home', 'order' => 1, 'code' => '2'];
        $note = ['id' => 6, 'parent_id' => null, 'title' => 'یادداشت', 'icon' => 'fa fa-edit', 'route' => 'note', 'order' => 2, 'code' => '6'];
        $subject = ['id' => 7, 'parent_id' => null, 'title' => 'سرفصل ها و موضوعات', 'icon' => 'fa fa-cubes', 'route' => 'subject', 'order' => 3, 'code' => '7'];
        $dailyBook = ['id' => 8, 'parent_id' => null, 'title' => 'دفتر روزنامه', 'icon' => 'fa fa-book', 'route' => 'dailyBook', 'order' => 4, 'code' => '8'];

        $users = ['id' => 4, 'parent_id' => null, 'title' => 'مدیریت سیستم', 'icon' => 'fa fa-cogs', 'route' => '#', 'order' => 5, 'code' => '4'];
        $personnel = ['id' => 1, 'parent_id' => 4, 'title' => 'اطلاعات افراد', 'icon' => 'fa fa-users', 'route' => 'personnel', 'order' => 1, 'code' => '1'];
        $setting = ['id' => 3, 'parent_id' => 4, 'title' => 'کاربران', 'icon' => '', 'route' => 'user', 'order' => 2, 'code' => '3'];
        $role = ['id' => 5, 'parent_id' => 4, 'title' => 'گروه های کاربری', 'icon' => '', 'route' => 'role', 'order' => 3, 'code' => '5'];
        \App\Action::create($dashboard);
        \App\Action::create($note);
        \App\Action::create($subject);
        \App\Action::create($dailyBook);
        \App\Action::create($users);
        \App\Action::create($personnel);
        \App\Action::create($setting);
        \App\Action::create($role);
    }
}
