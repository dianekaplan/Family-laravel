<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'email']);
//        $this->middleware('auth', ['except' => 'email']); // originally had this, but need to get here for 'forgot password' flow

    }

//
    public function password()
    {
        $this->middleware('guest');
        return view ('auth.password');
    }

//
//    // Password reset link request methods
//    public function getEmail()
//    {
//
//    }
////
//    public function postEmail()
//    {
//
//    }
////
//    // Password reset methods
//    public function getReset()
//    {
//
//    }
//
//    public function postReset()
//    {
//
//    }
}
