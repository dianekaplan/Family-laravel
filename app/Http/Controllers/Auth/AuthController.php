<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Person;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Acme\Mailers\UserMailer as Mailer;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $mailer;

    protected $redirectTo = '/home'; //default location to send users after login (if no other redirect path)

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->mailer= $mailer;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'person_id' => $data['person_id'],
//            'connection_notes' => $data['connection_notes'],
//            'keem_access' => $data['keem_access'],
//            'husband_access' => $data['husband_access'],
//            'kemler_access' => $data['kemler_access'],
//            'kaplan_access' => $data['kaplan_access'],
//
//        ]);
//    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'person_id' => $data['person_id'],
            'connection_notes' => $data['connection_notes'],
            'keem_access' => $data['keem_access'],
            'husband_access' => $data['husband_access'],
            'kemler_access' => $data['kemler_access'],
            'kaplan_access' => $data['kaplan_access'],

        ]);

        $person = Person::findOrNew($user->person_id);

//        $this->mailer->welcome($user);
        $this->mailer->welcome($user, $person);

        return $user;
    }





}
