<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\MyBaseModel;

class Family extends MyBaseModel
{

    use RecordsActivity;
//    protected static $recordEvents = ['created'];  //if you only wanted to record for one type, specify like this

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

    protected $dates = ['marriage_date'];

    public function setMarriagedateAttribute($marriage_date)
    {
        $this->attributes['marriage_date'] = $this->nullIfBlank($marriage_date);
    }


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

    public function scopeOriginal($query)
    {
        $query->where('original_family', '=', true);
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
