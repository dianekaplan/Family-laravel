<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Person;

class AudioFile extends Model
{
    protected $fillable = [
        'filename', 'summary', 'recording_date', 'start', 'stop'
    ];

    // determine the people discussed in the audio file
    public function people()
    {
//        return $this->belongsToMany('App\Person');

        // In case automatic naming conventions don't work, you can specify what you're using:
//        https://laravel.com/docs/5.1/eloquent-relationships#many-to-many
//        return $this->belongsToMany('App\Person', 'audio_file_person', 'audio_file_id', 'person_id');
        return $this->belongsToMany('App\Person', 'audio_file_person', 'person_id', 'audio_file_id');

//        return $this->belongsToMany(Person::class, 'audio_file_person', 'person_id', 'audio_file_id');
//        https://laracasts.com/discuss/channels/laravel/multi-word-model-names-with-many-to-many-relationships

    }

    public function getPersonListAttribute()
    {
        return $this->people->lists('id')->all();
    }

    // If you ever want a gallery of audio clips, add scopeKaplans/etc like you have for video

}
