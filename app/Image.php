<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'big_name', 'std_name','little_name', 'caption', 'subject', 'featured', 'year', 'family'
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

