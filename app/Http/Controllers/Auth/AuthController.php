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

    // If you're looking for how/where we log people in, look at AuthenticatesUsers
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
//        $this->middleware('super', ['only' => 'register']);  //worked fine in HomeController
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
        $this->mailer->welcome($user, $person);

        return $user;
    }


//    /**
//     * This comes from AuthenticatesUsers.php, and I'm redefining it here so I can add a step
//     * http://stackoverflow.com/questions/28584531/modify-existing-authorization-module-email-to-username
//     */
//    public function postLogin(Request $request)
//    {
//        $this->validate($request, [
//            $this->loginUsername() => 'required', 'password' => 'required',
//        ]);
//
//        // If the class is using the ThrottlesLogins trait, we can automatically throttle
//        // the login attempts for this application. We'll key this by the username and
//        // the IP address of the client making these requests into this application.
//        $throttles = $this->isUsingThrottlesLoginsTrait();
//
//        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
//            return $this->sendLockoutResponse($request);
//        }
//
//        $credentials = $this->getCredentials($request);
//
//        if (Auth::attempt($credentials, $request->has('remember'))) {
//            return $this->handleUserWasAuthenticated($request, $throttles);
//        }
//
//        // If the login attempt was unsuccessful we will increment the number of attempts
//        // to login and redirect the user back to the login form. Of course, when this
//        // user surpasses their maximum number of attempts they will get locked out.
//        if ($throttles) {
//            $this->incrementLoginAttempts($request);
//        }
//
//        return redirect($this->loginPath())
//            ->withInput($request->only($this->loginUsername(), 'remember'))
//            ->withErrors([
//                $this->loginUsername() => $this->getFailedLoginMessage(),
//            ]);
//    }




}
