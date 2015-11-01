<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'caption',
        'mother_id',
        'father_id',
        'marriage_date',
        'notes1',
        'notes2',
        'original_family',
        'no_kids_bool',
        'keem_line',
        'husband_line',
        'kemler_line',
        'kaplan_line',
        'divorced',
        'show_on_branch_view',
        'flag1',
        'flag2',
    ];

    protected $dates = ['birthdate'];

    public function scopeKaplans($query)
    {
        $query->where('kaplan_line', '=', 'true')
            ->where('show_on_branch_view', '=', 'true')
            ->orderBy('branch_seq', 'asc');
    }

    public function scopeKemlers($query)
    {
        $query->where('kemler_line', '=', 'true')
            ->where('show_on_branch_view', '=', 'true')
            ->orderBy('branch_seq', 'asc');
    }

    public function scopeKeems($query)
    {
        $query->where('keem_line', '=', 'true')
            ->where('show_on_branch_view', '=', 'true')
            ->orderBy('branch_seq', 'asc');
    }

    public function scopeHusbands($query)
    {
        $query->where('husband_line', '=', 'true')
            ->where('show_on_branch_view', '=', 'true')
            ->orderBy('branch_seq', 'asc');
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
