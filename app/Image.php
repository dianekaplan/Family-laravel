<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Image extends Model
{
    protected $fillable = [
        'id', 'big_name', 'std_name','little_name', 'caption', 'subject', 'featured', 'year', 'family',
        'keem_line', 'husband_line', 'kemler_line', 'kaplan_line',

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

//    @TODO same as in families & people & videos- can this be a partial or a trait?
    public function scopeKaplans($query)
    {
        $query->where('kaplan_line', '=', 'true') ;
    }

    public function scopeKemlers($query)
    {
        $query->where('kemler_line', '=', 'true') ;
    }

    public function scopeKeems($query)
    {
        $query->where('keem_line', '=', 'true') ;
    }

    public function scopeHusbands($query)
    {
        $query->where('husband_line', '=', 'true') ;
    }

    public function scopeRecent($query)
    {
        $query->where('created_at', '>', Carbon::now()->subDays(200))->orderBy('created_at', 'desc') ;
    }

}

