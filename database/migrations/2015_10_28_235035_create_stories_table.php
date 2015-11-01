<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('image')->nullable();
            $table->text('intro')->nullable();
            $table->string('slug')->nullable();
            $table->string('source')->nullable();
            $table->text('text')->nullable();
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
        Schema::drop('stories');
    }
}
