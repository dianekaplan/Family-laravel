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
            $table->integer('first_family')->nullable();;
            $table->boolean('sibling_seq')->nullable();
            $table->boolean('keem_bool');
            $table->boolean('husband_bool');
            $table->boolean('kemler_bool');
            $table->boolean('kaplan_bool');
            $table->boolean('direct_bool')->nullable();
            $table->boolean('hide_bool')->default(0);
            $table->text('interests')->nullable();
            $table->text('education')->nullable();
            $table->text('work')->nullable();
            $table->text('notes1')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->date('deathdate')->nullable();
            $table->string('resting_place')->nullable();
            $table->string('flag1')->nullable();
            $table->string('flag2')->nullable();
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
