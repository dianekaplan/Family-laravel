<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {

        App\User::create([
            'name' => 'Diane Kaplan',
            'email' = > 'ok4mee@hotmail.com',
            'password' => bcrypt('password'),
            'person_id' => '1',
            ];


//        factory('App\User', 50)->create();

    }

}