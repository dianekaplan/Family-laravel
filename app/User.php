<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'person_id', 'super_admin',
        'last_pestered', 'connection_notes', 'furthest_html', 'keem_access',
        'husband_access', 'kemler_access', 'kaplan_access', 'logins', 'shared_account',
        'active_bool', 'last_login', 'last_pestered', 'created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    //A user can have many updates he/she adds
    public function updates()
    {
        return $this->hasMany('App\Update');
    }

    public function isASuperUser()
    {
        if ($this->super_admin)
        return true;
    }

    public function scopeNeverSeen($query)
    {
        $query->where('last_login')->orwhere('last_login', '<', '01-02-1900');
    }

    public function scopeHaveSeen($query)
    {
        $query->where('last_login', '>', '01-02-1900');
    }
    public function scopeUnchangedPassword($query)
    {
        // encrypted version of 'password' (original default)
        $query->where('password', '=', '$2y$10$eOAL7mwV3ov9LOmMa/DgNu0iOt/IH/90fNt5Scva2taZss8PLi5AW');
    }

    public function activity()
    {
//            return $this->hasMany('App\Activity');
        return $this->hasMany('App\Activity')->with(['user', 'subject'])->latest();
    }

    public function logins()
    {
        return $this->hasMany('App\Login');
    }


    public function notes()
    {
//            return $this->hasMany('App\Activity');
        return $this->hasMany('App\Note');
    }


    public function person()
    {
        return $this->belongsTo(Person::class);
    }

//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = mcrypt($password);
//Call to undefined function App\mcrypt()
//    }

    //Protected $dates = [last_login, last_pestered];
}



