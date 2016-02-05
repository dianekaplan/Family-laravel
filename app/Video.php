<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Person;

class Video extends Model
{
    protected $fillable = [
        'name', 'caption', 'subject', 'year', 'start', 'stop'
    ];

    public function people()
    {
//        return $this->belongsToMany('App\Person', 'person_video');
        return $this->belongsToMany('App\Person', 'person_video')->withPivot('description');
        //when I add description, the whole collection seems to go empty
//        return $this->belongsToMany('App\Person', 'person_video', 'description');
    }


    public function getPersonListAttribute()
    {
        return $this->people->lists('id')->all();
    }

    //    @TODO same as in families & people & images- can this be a partial or a trait?
    public function scopeKaplans($query)
    {
        $query->where('kaplan_line', '=', 'true')->orderBy('year', 'asc') ;
    }

    public function scopeKemlers($query)
    {
        $query->where('kemler_line', '=', 'true')->orderBy('year', 'asc') ;
    }

    public function scopeKeems($query)
    {
        $query->where('keem_line', '=', 'true')->orderBy('year', 'asc') ;
    }

    public function scopeHusbands($query)
    {
        $query->where('husband_line', '=', 'true')->orderBy('year', 'asc') ;
    }


}
