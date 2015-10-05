<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        App\Person::create([
                'first' => 'Diane',
                'middle' => 'Rachel',
                'last' => 'Kaplan',
                 'gender' => 'F',
                'keem_line' => 'true',
                'husband_line' => 'true',
                'kemler_line' => 'true',
                'kaplan_line' => 'true',
                'birthdate' => '1976-09-28',
            ]);

        App\Person::create([
            'first' => 'Susan',
            'middle' => 'Carol',
            'last' => 'Kaplan',
            'maiden' => 'Husband',
            'gender' => 'F',
            'keem_line' => 'true',
            'husband_line' => 'true',
            'kemler_line' => 'false',
            'kaplan_line' => 'false',
            'birthdate' => '1947-11-09',
        ]);

        App\Person::create([
            'first' => 'Kenneth',
            'middle' => 'Herbert',
            'last' => 'Kaplan',
            'gender' => 'M',
            'keem_line' => 'false',
            'husband_line' => 'false',
            'kemler_line' => 'true',
            'kaplan_line' => 'true',
            'birthdate' => '1940-03-17',
        ]);

        App\Person::create([
            'first' => 'Larry',
            'middle' => 'David',
            'last' => 'Kaplan',
            'gender' => 'M',
            'keem_line' => 'false',
            'husband_line' => 'false',
            'kemler_line' => 'true',
            'kaplan_line' => 'true',
            'birthdate' => '1974-02-09',
        ]);

        App\Person::create([
            'first' => 'Jessica',
            'last' => 'Kaplan',
            'maiden' => 'Moore',
            'gender' => 'F',
            'keem_line' => 'false',
            'husband_line' => 'false',
            'kemler_line' => 'false',
            'kaplan_line' => 'false',
            'birthdate' => '1975-12-29',
        ]);

        App\Person::create([
            'first' => 'Violet',
            'middle' => 'Catherine',
            'last' => 'Kaplan',
            'gender' => 'F',
            'keem_line' => 'true',
            'husband_line' => 'true',
            'kemler_line' => 'true',
            'kaplan_line' => 'true',
            'birthdate' => '2013-10-21',
        ]);

        App\Person::create([
            'first' => 'Stella',
            'middle' => 'Nadia Rose',
            'last' => 'Kaplan',
            'gender' => 'F',
            'keem_line' => 'true',
            'husband_line' => 'true',
            'kemler_line' => 'true',
            'kaplan_line' => 'true',
            'birthdate' => '2015-09-02',
        ]);

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
