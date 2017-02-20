<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request; // adding for overridden postEmail
use Illuminate\Support\Facades\Password;  // adding for overridden postEmail
use Illuminate\Mail\Message; // adding for overridden postEmail
use Illuminate\Support\Str; // adding for overridden postEmail

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
        // // originally had this, but it kept unauthenticated users from reaching the 'forgot password' flow
//        $this->middleware('auth', ['except' => 'email']);
    }

//
    public function password()
    {
        $this->middleware('guest');
        return view ('auth.password');
    }


    // I'm overriding this function from the ResetsPasswords trait,
    // modified for the case where user is logged in ('Reset My Password'), to show THAT email address
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        $user =  \Auth::user();
//        return view('auth.password');
        return view('auth.password', compact('user'));


    }



    // I'm overriding this function from the ResetsPasswords trait,
    // modified to convert the typed email value to lowercase
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // adding this line
        $request['email'] =  Str::lower($request['email']);

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }
////
//    // Password reset methods
//    public function getReset()
//    {
//
//    }
//

    // I'm overriding this function from the ResetsPasswords trait,
    // modified to convert the typed email value to lowercase
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // adding this line
        $request['email'] =  Str::lower($request['email']);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect($this->redirectPath())->with('status', trans($response));

            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }
}
