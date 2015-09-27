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
        'keem_bool',
        'husband_bool',
        'kemler_bool',
        'kaplan_bool',
    ];

    protected $dates = ['birthdate'];

    public function scopeDisplayable($query)
    {
        $query->where('hide_bool', '=', false);
    }

    //get the tags associated with the given person
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //get list of tag IDs  associated with the given person
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
