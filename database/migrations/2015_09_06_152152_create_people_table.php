<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first');
            $table->string('middle');
            $table->string('last');
            $table->string('maiden');
            $table->string('nickname');
            $table->string('gender');
            $table->string('home');
            $table->string('face');
            $table->string('origin');
            $table->integer('first_family');
            $table->boolean('sibling_seq');
            $table->boolean('keem_bool');
            $table->boolean('husband_bool');
            $table->boolean('kemler_bool');
            $table->boolean('kaplan_bool');
            $table->boolean('direct_bool');
            $table->boolean('hide_bool');
            $table->text('interests');
            $table->text('education');
            $table->text('work');
            $table->text('notes1');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->date('deathdate');
            $table->string('resting_place');
            $table->string('flag1');
            $table->string('flag2');
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
        Schema::drop('people');
    }
}
