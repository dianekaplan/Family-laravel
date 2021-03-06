<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    use RecordsActivity;


    protected $fillable = [
        'ref_id', 'type','from_person', 'body', 'from_name', 'date', 'active'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}

