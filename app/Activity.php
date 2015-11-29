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

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function subject()
    {
        return $this->morphTo();  //this is like belongsTo, but it's polymorphic
    }
}
