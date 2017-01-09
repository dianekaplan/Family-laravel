<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudioFilePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_file_person', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('audio_file_id');
            $table->timestamps();

//            $table->foreign('audio_file_id')
//                ->references('id')
//                ->on('audio_files');
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
        Schema::drop('audio_file_person');
    }
}
