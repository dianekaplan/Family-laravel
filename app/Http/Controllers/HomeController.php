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
use App\Image;
use App\Update;
use DB;
use App\Family;
use Carbon\Carbon;


class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'landing']);
        //$this->middleware('auth', ['only' => 'create']);
    }

    public function landing()
    {

        $people = Person::ShowOnLandingPage('created_at')
            ->displayable()
            ->orderBy('last', 'asc', 'first', 'asc')
            ->get();

        return view ('pages.landing', compact('people'));
    }


    public function index()
    {
        return view ('welcome');
    }

    public function branches()
    {
        return view ('pages.branch_explanation');
    }

    public function get_notes_added_by_person($person)
    {
        $notes = DB::table('notes')
            ->Where('author', $person->id)
            ->Where('active', true)
            ->get();

        return $notes;
    }

public function get_birthday_people()
{
    $birthday_people = Person::birthdays('created_at')->displayable()->get();
    return $birthday_people;
}


    public function get_updates_from_user ($user)
    {
        $id = $user->id;

        $suggested_updates = Update::latest('created_at')
            ->Where('user_id', $user->id)
            ->get();

        return $suggested_updates;
    }

    public function get_recently_added_pictures ()
    {
        $new_pictures = Image::latest('created_at' )
            ->Where('created_at', '>', Carbon::now()->subDays(7) )
            ->take(11)
            ->get();

        return $new_pictures;
    }


    public function home()
    {
        $user =  \Auth::user();
        //deciding where these should be, if in both places then should make one variable up top that they can both use
        $person = Person::all()
            ->Where('id', $user->person_id)
            ->first();

        $birthday_people = HomeController::get_birthday_people();
        $new_pictures = HomeController::get_recently_added_pictures();

        return view ('pages.home', compact('user', 'person', 'birthday_people', 'new_pictures'));
    }

    public function account()
    {
        $user =  \Auth::user();

//        $person = Person::all()
//            ->Where('id', $user->person_id)
//            ->first();
////
//        $notes_added = HomeController::get_notes_added_by_person($person);
//        $updates_suggested = HomeController::get_updates_from_user($user);
//
        return view ('pages.account', compact('user'));
//        return view ('pages.account', compact('user', 'notes_added', 'updates_suggested'));
    }

    public function outline()
    {
        $user = \Auth::user();
//        $original_families = Family::original('created_at')->get();
        $original_keems = Family::keems('created_at')->original()->get();
        $original_husbands = Family::husbands('created_at')->original()->get();
        $original_kemlers = Family::kemlers('created_at')->original()->get();
        $original_kaplans = Family::kaplans('created_at')->original()->get();

        return view('pages.outline', compact('user', 'original_keems', 'original_husbands', 'original_kemlers', 'original_kaplans'));
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

    public function history()
    {
        $user =  \Auth::user();
        return view ('pages.history', compact('user'));
    }

    public function contact()
    {
        return view ('pages.contact');
    }

}