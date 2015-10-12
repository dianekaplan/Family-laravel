<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('big_name')->nullable();
            $table->string('std_name')->nullable();
            $table->string('little_name')->nullable();
            $table->string('caption')->nullable();
            $table->integer('subject')->nullable();
            $table->integer('featured')->nullable();
            $table->string('year')->nullable();
            $table->integer('family')->nullable();
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
        Schema::drop('images');
    }
}
