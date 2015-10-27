<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('person_id')->nullable();
            $table->tinyInteger('family_id')->nullable();
            $table->boolean('moderated')->default(true);
            $table->text('status')->nullable(); //and then I'll do an update later to set added based on this
            $table->boolean('added')->default(false);
            $table->text('update_summary')->nullable();
            $table->date('note_date')->nullable();
            $table->timestamps();

//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('updates');
    }
}
