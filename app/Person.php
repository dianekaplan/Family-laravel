<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
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
        'resting_place',
        'keem_line',
        'husband_line',
        'kemler_line',
        'kaplan_line',
    ];

    protected $dates = ['birthdate', 'deathdate'];


    public function scopeDisplayable($query)
    {
        $query->where('hide_bool', '=', false);
    }

    public function scopeKaplans($query)
    {
        $query->where('kaplan_line', '=', 'true');
    }

    public function scopeKemlers($query)
    {
        $query->where('kemler_line', '=', 'true');
    }

    public function scopeKeems($query)
    {
        $query->where('keem_line', '=', 'true');
    }

    public function scopeHusbands($query)
    {
        $query->where('husband_line', '=', 'true');
    }


    //get the tags associated with the given person
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //get list of tag IDs  associated with the given person
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }

    //get the images associated with the given person
    public function images()
    {
        return $this->belongsToMany('App\Image')->withTimestamps();
    }

    //get list of tag IDs  associated with the given person
    public function getImageListAttribute()
    {
        return $this->images->lists('id')->all();
    }


}
