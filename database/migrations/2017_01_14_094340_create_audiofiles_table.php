<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename')->nullable();
            $table->string('summary')->nullable();
            $table->date('recording_date')->nullable();
            $table->string('start')->nullable();
            $table->string('stop')->nullable();
            $table->boolean('keem_line')->nullable();
            $table->boolean('husband_line')->nullable();
            $table->boolean('kemler_line')->nullable();
            $table->boolean('kaplan_line')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('audiofiles');
    }
}
