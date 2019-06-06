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
        $admin->password = \Illuminate\Support\Facades\Hash::make('12345678');
        $admin->role_id = 1;
        $admin->save();
    }
}
