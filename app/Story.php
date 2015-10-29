<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'description', 'image','text', 'slug', 'source', 'created_at', 'updated_at'
    ];

    //get the people associated with the given special info item
    //would need these on a story display page where I'm getting the families
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }


    public function getPersonListAttribute()
    {
        return $this->people->lists('id')->all();
    }

    //get the families associated with the given special info item
    //would need these on a story display page where I'm getting the families
    //not planning on associating with multiple families yet
    public function family()
    {
        return $this->belongsToMany('App\Family');
    }

    public function getFamilyListAttribute()
    {
        return $this->family->lists('id')->all();
    }

}