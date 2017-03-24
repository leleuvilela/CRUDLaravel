<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Entities\Project::truncate();
        factory(\App\Entities\User::class, 10)->create([
            'name' => 'Vinicius',
            'email' => 'a@a.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
    }
}
