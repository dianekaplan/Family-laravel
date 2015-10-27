<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->string('source')->nullable();
            $table->string('image')->nullable();
            $table->text('text');
            $table->text('slug')->nullable();

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
        Schema::drop('specialinfo');
    }
}
