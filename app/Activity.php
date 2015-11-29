<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    protected $fillable = [

        'subject_id',
        'subject_type',
        'user_id',
        'name',
    ];
}
