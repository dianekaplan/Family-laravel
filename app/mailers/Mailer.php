<?php namespace Acme\Mailers;

use Mail;

abstract class Mailer {
    public function sendTo($user, $subject, $view, $data= [])
    {
        //had Mail::send, but laracast says this'll work when I have a queue and default to send if I don't
        //https://laracasts.com/lessons/mailers
        Mail::queue($view, $data, function($message) use($user, $subject)
        {
            $message->to($user->email)->subject($subject);
        });

    }


}