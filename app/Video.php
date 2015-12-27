<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name', 'caption', 'subject', 'year', 'start', 'stop'
    ];

    //get the people associated with the given tag
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }


    public function getPersonListAttribute()
    {
        return $this->people->lists('id')->all();
    }

}
