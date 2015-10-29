<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_story', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->integer('family_id');
            $table->integer('type')->nullable(); //will get rid of this later
            $table->timestamps();

//            $table->foreign('story_id')
//                ->references('id')
//                ->on('stories');

            //            $table->foreign('family_id')
//                ->references('id')
//                ->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('family_story');
    }
}
