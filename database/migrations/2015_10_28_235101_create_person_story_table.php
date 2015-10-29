<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_story', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->integer('person_id');
            $table->integer('type')->nullable(); //will get rid of this later
            $table->timestamps();

//            $table->foreign('story_id')
//                ->references('id')
//                ->on('stories');

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
        Schema::drop('person_story');
    }
}
