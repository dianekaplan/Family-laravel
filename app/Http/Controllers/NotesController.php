<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Acme\Mailers\UserMailer as Mailer;

class NotesController extends Controller
{

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth');

        $this->mailer= $mailer;
    }

    public function add_note($type, $id, $name)
//            public function add_note($type, $id, $name)
    {
        $user =  \Auth::user();

        return view ('pages.add_note', compact('type', 'id', 'user', 'name'));
    }


    public function store(SaveNoteRequest $request)

    {
        $note = new Note($request->all());

        $user_who_added_note =  \Auth::user();
        $user_who_added_note->notes()->save($note); //save the note for the user that's logged in

        $diane_user = User::find(1);
//
//        $this->mailer->update_notify($diane_user, $update, $user_who_made_update);
//        $this->mailer->update_thankyou($user_who_made_update, $update);

        return redirect('updates');
    }


}
