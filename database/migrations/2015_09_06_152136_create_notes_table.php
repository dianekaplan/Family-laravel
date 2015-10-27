<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('author')->nullable(); /**for now, later will update and make unsigned*/
            $table->string('author_name')->nullable();
            $table->text('body')->nullable();
            $table->date('date')->nullable();
            $table->integer('ref_id')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('for_self')->default(false);
            $table->timestamps();

//            $table->foreign('author')
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
        Schema::drop('notes');
    }
}
