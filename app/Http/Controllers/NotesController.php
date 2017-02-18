<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveNoteRequest;
use App\Http\Controllers\Controller;
use Acme\Mailers\UserMailer as Mailer;
use App\Note;
use App\User;

class NotesController extends Controller
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth');

        $this->mailer= $mailer;
    }

    public function add_note($type, $id, $name)
    {
        $user =  \Auth::user();

        return view ('pages.add_note', compact('type', 'id', 'user', 'name'));
    }


    public function store(SaveNoteRequest $request)
    {
//        $note->body = $request->input('body');
        $diane_user = User::find(1);
        $user_who_added_note =  \Auth::user();
        $note_author_name =  $user_who_added_note->name;
        $redirect_url = $request->type . '/' . $request->ref_id;
        $entity_with_new_note =  $request->ref_id;
        $body = $request->body;
        $type = $request->type;
//        @FIXME: all of this, obviously

        if ($type == 'people') {
        $terrible_hack = '1';
    }
            else {
        $terrible_hack = '2';
    }
        $note = new Note;
        $note->body = $body;
        $note->type = $terrible_hack;
        $note->ref_id = $entity_with_new_note;
        $note->author = $user_who_added_note->person_id;
        $note->author_name = $note_author_name;
        $note->active = true;
        $note->save();

        // @FIXME: come back and fix; including this gives Undefined column: 7 ERROR: column "user_id" of relation "notes" does not exist
//        $user_who_added_note->notes()->save($note); //save the note for the user that's logged in

        $this->mailer->note_notify($diane_user, $user_who_added_note, $entity_with_new_note, $body,$redirect_url);
        $this->mailer->note_thankyou($user_who_added_note, $entity_with_new_note, $body, $redirect_url);

        return redirect($redirect_url);
    }


}
