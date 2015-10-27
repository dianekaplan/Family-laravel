<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonSpecialInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_specialinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('specialinfo_id');
            $table->integer('type');  //this will be deleted later when the data's in
            $table->integer('person_id');

//            $table->foreign('info_id')
//                ->references('id')
//                ->on('special_info');

        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('person_specialinfo');
    }
}
