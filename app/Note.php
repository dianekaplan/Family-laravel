<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'ref_id', 'type','from_person', 'body', 'from_name', 'date', 'active'
    ];




}

