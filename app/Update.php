<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Update extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'updates';
    protected $casts =[
        'before' =>'jsonb',
        'after' =>'jsonb'

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'person_id', 'family_id', 'update_summary'];
    //user_id is temporary- we'll be able to take that out once we have auth set up

    public function scopePending($query)
    {
        $query->where('added', '=', 'false');
    }

    //@@TODO: come back  to see if this works (added in episode 11)
    public function setAddedAttribute($update)
    {
        $this->attributes['added'] = true;
    }

    protected $hidden = ['moderated'];


//An update (request) is created by a user
    public function requesting_user()
    {
        return $this->belongsTo('App\User');
    }
    //later this can make it possible to have a route to a page showing updates from a specific user (episode 14, 15:41)
    //where('username', 'John Doe')->first();
    //in controller, you'd return view('updates.index', compact('updates'));

}

