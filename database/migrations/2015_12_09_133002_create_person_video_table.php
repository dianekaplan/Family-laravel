<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('video_id');
            $table->timestamps();

//            $table->foreign('video_id')
//                ->references('id')
//                ->on('videos');

            //            $table->foreign('person_id')
//                ->references('id')
//                ->on('people');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('person_video');
    }
}
