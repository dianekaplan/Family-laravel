<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    //get the people associated with the given tag
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

}
