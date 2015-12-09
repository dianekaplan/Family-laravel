<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('caption')->nullable();
            $table->string('year')->nullable();
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
        //
    }
}
