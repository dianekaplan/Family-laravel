<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //added this from intermediate-laravel/episodes/9
    protected $toTruncate = ['users'];

    public function run()
    {
        Model::unguard();

        foreach ($this->$toTruncate as $table){
            DB::table($table)->tuncate();
        }


        $this->call('UsersTableSeeder');
        //$this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
