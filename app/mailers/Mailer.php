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

    // This one takes a recipient list to email to
    public function sendToMany($subject, $recipient_list, $view, $data= [])
    {
        foreach ($recipient_list as $recipient) {

            // trim leading space
            $recipient = trim($recipient);

            Mail::queue($view, $data, function($message) use($subject, $recipient)
            {
                $message->to($recipient)->subject($subject);

            });
        }

    }


}