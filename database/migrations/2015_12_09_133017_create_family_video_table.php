<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->integer('video_id');
            $table->timestamps();

//            $table->foreign('video_id')
//                ->references('id')
//                ->on('videos');

            //            $table->foreign('family_id')
//                ->references('id')
//                ->on('family');
        });
    }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
    {
        Schema::drop('family_video');
    }

    }