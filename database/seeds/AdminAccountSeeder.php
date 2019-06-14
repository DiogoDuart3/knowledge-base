<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\models\User();
        $admin->name = "Admin";
        $admin->email = "admin@admin.com";
        $admin->password = '12345678';
        $admin->role_id = 2;
        $admin->save();
    }
}
