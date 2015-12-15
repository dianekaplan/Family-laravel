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

//    @TODO same as in families & people- can this be a partial or a trait?
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

