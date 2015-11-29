<?php

namespace App;
use ReflectionClass;

trait RecordsActivity
{
    //This was all thanks to this: https://laracasts.com/lessons/build-an-activity-feed-in-laravel

    protected static function bootRecordsActivity()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model)  use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    protected static function boot()
    {
        parent::boot();

        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model)  use ($event) {
            $model->recordActivity($event);
            });
        }
    }


    public function recordActivity($event){  //because it's public, we can do $person->recordActivity('favorited')

        Activity::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'user_id' => \Auth::id(),  //or could use $this->user_id
            'name' => $this->getActivityName($this, $event),
        ]);
    }


    protected static function getActivityName($model, $action)
    {

       $name = strtolower((new ReflectionClass($model))->getShortName());
        return "{$action}_{$name}";
    }

    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)){

            return static::$recordEvents; //if we specify it for the class, honor that choice instead of doing all
        }

        return [
            'created', 'deleted', 'updated'
            //some others are updating/creating (the moment before) and saved
        ];
    }




}

