<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caption');
            $table->integer('mother_id')->nullable(); /**for now, later will update and make unsigned*/
            $table->integer('father_id')->nullable(); /**for now, later will update and make unsigned*/
            $table->date('marriage_date')->nullable();
            $table->text('marriage_date_note')->nullable();
            $table->text('notes1')->nullable();
            $table->text('notes2')->nullable();
            $table->boolean('original_family')->nullable();
            /**will come back and add the generation stuff*/

//            later consider deriving/omitting  no_kids_bool
            $table->boolean('no_kids_bool')->nullable();
            $table->integer('sequence')->nullable();
            $table->integer('branch')->nullable();
            $table->integer('branch_seq')->nullable();
            $table->boolean('keem_line');
            $table->boolean('husband_line');
            $table->boolean('kemler_line');
            $table->boolean('kaplan_line');
            $table->boolean('divorced')->nullable()->default(false);
            $table->boolean('show_on_branch_view')->nullable();
            $table->string('flag1')->nullable();
            $table->string('flag2')->nullable();

            $table->integer('junk')->nullable();
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
        Schema::drop('families');
    }
}
