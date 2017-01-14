<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Person;

class Audiofile extends Model
{
    protected $fillable = [
        'filename', 'summary', 'recording_date', 'start', 'stop'
    ];

    // determine the people discussed in the audio file
    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function getPersonListAttribute()
    {
        return $this->people->lists('id')->all();
    }

    // If you ever want a gallery of audio clips, add scopeKaplans/etc like you have for video

}
