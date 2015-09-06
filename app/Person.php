<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  //still getting MassAssignmentException even though I did this!

    protected $fillable = [

        'first',
        'last',
        'middle',
        'maiden',
        'nickname',
        'gender',
        'home',
        'origin',
        'interests',
        'education',
        'work',
        'notes1',
        'birthdate',
        'birthplace',
        'deathdate',
        'resting_place'
    ];
}
