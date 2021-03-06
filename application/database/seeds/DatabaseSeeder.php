<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(AdminAccountSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(IssueSeeder::class);
        //$this->call(UsersTableSeeder::class);
//        for($i = 0; $i < 10; $i++) {
//            factory(\App\models\User::class, 10000)->create();
//        }
    }
}
