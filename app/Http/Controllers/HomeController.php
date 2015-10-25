<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 9/5/2015
 * Time: 9:38 AM
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Person;
use App\Update;
use DB;

class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'landing']);
        //$this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
        return view ('welcome');
    }

    public function get_notes_added_by_person($person)
    {
        $notes = DB::table('notes')
            ->Where('author', $person->id)
            ->Where('active', true)
            ->get();

        return $notes;
    }

    public function get_updates_from_user ($user)
    {
        $id = $user->id;

        $suggested_updates = Update::latest('created_at')
            ->Where('user_id', $user->id)
            ->get();



//        $suggested_updates = DB::table('updates')
//            ->Where('user_id', $user->id)
//            ->get();

        return $suggested_updates;
    }


    public function home()
    {
        $user =  \Auth::user();
        //deciding where these should be, if in both places then should make one variable up top that they can both use
        $person = Person::all()
            ->Where('id', $user->person_id)
            ->first();
//
//        $notes_added = HomeController::get_notes_added_by_person($person);
//
//        $updates_suggested = HomeController::get_updates_from_user($user);


//        return view ('pages.home', compact('user', 'person', 'notes_added', 'updates_suggested'));
        return view ('pages.home', compact('user', 'person'));
    }

    public function account()
    {
        $user =  \Auth::user();

//        $person = Person::all()
//            ->Where('id', $user->person_id)
//            ->first();
////
//        $notes_added = HomeController::get_notes_added_by_person($person);
//
//        $updates_suggested = HomeController::get_updates_from_user($user);
//

        return view ('pages.account', compact('user'));
//        return view ('pages.account', compact('user', 'notes_added', 'updates_suggested'));
    }

    public function activity()
    {
        $user =  \Auth::user();

        $person = Person::all()
            ->Where('id', $user->person_id)
            ->first();

        $notes_added = HomeController::get_notes_added_by_person($person);

        $updates_suggested = HomeController::get_updates_from_user($user);


        return view ('pages.activity', compact('user', 'notes_added', 'updates_suggested'));
    }

    public function contact()
    {

        return view ('pages.contact');
    }

}