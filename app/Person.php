<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\MyBaseModel;

class Person extends MyBaseModel
{

    use RecordsActivity;

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
        'current_location',
        'notes1',
        'notes2',
        'notes3'
    ];

    protected $dates = ['birthdate', 'deathdate'];


    public function setBirthdateAttribute($birthdate)
    {
        $this->attributes['birthdate'] = $this->nullIfBlank($birthdate);
    }

    public function scopeDisplayable($query)
    {
        $query->where('hide_bool', '=', false);
    }

//    Landing page is for people searching/google/etc- don't include those married in, ?'s, etc
    public function scopeShowOnLandingPage($query)
    {
        $query->where('show_on_landing_page', '=', 'true');
    }



//    @TODO same as in families- can this be a partial or a trait?
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
        return $query->whereRaw('extract(month from birthdate) = ?', [Carbon::today()->month])->orderBy ('birthdate', 'asc');
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
