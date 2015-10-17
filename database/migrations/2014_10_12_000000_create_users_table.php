<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('person_id')->unsigned();
            $table->boolean('super_admin')->default(false);
            $table->date('last_login')->nullable();
            $table->tinyInteger('logins')->nullable();
            $table->date('last_pestered')->nullable();
            $table->boolean('active_bool')->default(true);
            $table->text('connection_notes')->nullable();
            $table->text('furthest_html')->nullable();
            $table->boolean('shared_account')->default(false);
            $table->boolean('keem_access')->default(false);
            $table->boolean('husband_access')->default(false);
            $table->boolean('kemler_access')->default(false);
            $table->boolean('kaplan_access')->default(false);

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('person_id')
                ->references('id')
                ->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
