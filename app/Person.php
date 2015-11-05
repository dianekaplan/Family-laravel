<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

//    Landing page is for people searching/google/etc- don't include those married in, ?'s, etc
    public function scopeShowOnLandingPage($query)
    {
        $query->where('show_on_landing_page', '=', 'true');
    }



//    @TODO same as in families- can this be a partial?
    public function scopeKaplans($query)
    {
        $query->where('kaplan_line', '=', 'true')->orderBy('last', 'asc', 'first', 'asc') ;
    }

    public function scopeKemlers($query)
    {
        $query->where('kemler_line', '=', 'true')->orderBy('last', 'asc', 'first', 'asc') ;
    }

    public function scopeKeems($query)
    {
        $query->where('keem_line', '=', 'true')->orderBy('last', 'asc', 'first', 'asc') ;
    }

    public function scopeHusbands($query)
    {
        $query->where('husband_line', '=', 'true')->orderBy('last', 'asc', 'first', 'asc') ;
    }

    public function scopeBirthdays($query)
    {
        return $query->where('birthdate', '=', '1947-11-09');
//                return $query->where('birthdate', '=', Carbon::today());

        // Syntax error: 7 ERROR: syntax error at or near "month"
//        LINE 1: select * from "people" where 1 month("birthdate") = $1
//    ^ (SQL: select * from "people" where 1 month("birthdate") = 11)
//        return $query->whereMonth('birthdate','=', '11', true);

        //still figuring out third argument:
        //http://laravel.com/api/5.1/Illuminate/Database/Query/Builder.html#method_whereMonth
//                return $query->whereMonth('birthdate', '=', Carbon::today()->month, true);

        //this one gives me results but doesn't like displayable() and other Person stuff- doesn't know it's a person maybe
//        return $query->whereRaw('extract(month from birthdate) = ?', ['11'])->get();


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
//        return $this->belongsToMany('App\Image')->withTimestamps();
        return $this->belongsToMany('App\Image')->withTimestamps()->OrderBy('year', 'asc');
    }

    //get list of image IDs  associated with the given person
    public function getImageListAttribute()
    {
        return $this->images->lists('id')->all();
    }


    public function stories()
    {
        return $this->belongsToMany('App\Story')->withTimestamps();
    }

    public function getStoryListAttribute()
    {
        return $this->stories->lists('id')->all();
    }

}
