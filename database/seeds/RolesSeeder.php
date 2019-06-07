<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\models\Role::create(['name'=>'user']);
        \App\models\Role::create(['name'=>'admin']);
    }
}
