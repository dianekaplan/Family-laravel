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
            $table->string('middle')->nullable();
            $table->string('last');
            $table->string('maiden')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->string('home')->nullable();
            $table->string('face')->nullable();
            $table->string('origin')->nullable();
            $table->string('current_location')->nullable();
            $table->integer('family_of_origin')->nullable();;
            $table->integer('sibling_seq')->nullable();
            $table->boolean('keem_line');
            $table->boolean('husband_line');
            $table->boolean('kemler_line');
            $table->boolean('kaplan_line');
            $table->boolean('adopted')->nullable();
            $table->boolean('direct_bool')->nullable();
            $table->boolean('hide_bool')->default(0);
            $table->text('interests')->nullable();
            $table->text('education')->nullable();
            $table->text('work')->nullable();
            $table->date('birthdate')->nullable();
            $table->text('birthdate_note')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('deathdate')->nullable();
            $table->text('deathdate_note')->nullable();
            $table->string('resting_place')->nullable();
            $table->string('flag1')->nullable();
            $table->string('flag2')->nullable();
            $table->string('ext_id')->nullable();
            $table->string('notes1')->nullable();
            $table->string('notes2')->nullable();
            $table->string('notes3')->nullable();
            $table->string('last_modified')->nullable();
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
