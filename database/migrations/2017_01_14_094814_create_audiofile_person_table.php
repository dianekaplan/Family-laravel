<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiofilePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiofile_person', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('audiofile_id');
            $table->timestamps();

//            $table->foreign('audiofile_id')
//                ->references('id')
//                ->on('audiofiles');
//
//             $table->foreign('person_id')
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
        Schema::drop('audiofile_person');
    }
}
