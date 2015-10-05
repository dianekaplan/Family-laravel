<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'caption',
        'mother_id',
        'father_id',
        'marriage_date',
        'notes1',
        'notes2',
        'original_family',
        'no_kids_bool',
        'keem_line',
        'husband_line',
        'kemler_line',
        'kaplan_line',
        'divorced',
        'show_on_branch_view',
        'flag1',
        'flag2',
    ];

    protected $dates = ['birthdate'];


}
