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
use Illuminate\Support\Collection;
use App\Person;
use App\Image;
use App\Update;
use DB;
use App\Family;
use Carbon\Carbon;
use App\User;
use App\Activity;


class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['landing', 'register']]);
        $this->middleware('super', ['only' => 'admin']);
    }

    public function landing()
    {
        $people = Person::ShowOnLandingPage()
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

    public function get_notes_added_by_person(Person $person)
    {
        $notes = DB::table('notes')
            ->Where('author', $person->id)
            ->Where('active', true)
            ->get();

        return $notes;
    }

    public function get_birthday_people()
    {
        $user =  \Auth::user();

        $birthday_people = new Collection;

        if($user->keem_access) {$birthday_people = $birthday_people->merge(Person::birthdays()->displayable()->keems()->get());}
        if($user->husband_access) {$birthday_people = $birthday_people->merge(Person::birthdays()->displayable()->husbands()->get());}
        if($user->kemler_access) {$birthday_people = $birthday_people->merge(Person::birthdays()->displayable()->kemlers()->get());}
        if($user->kaplan_access) {$birthday_people = $birthday_people->merge(Person::birthdays()->displayable()->kaplans()->get());}

        $birthday_people = $birthday_people->sortBy('birthdate');

        return $birthday_people;
    }



    public function get_updates_from_user (User $user)
    {
        $suggested_updates = Update::latest('created_at')
            ->Where('user_id', $user->id)
            ->get();

        return $suggested_updates;
    }

    public function get_recently_added_pictures ()
    {
        $new_pictures = Image::latest('created_at' )
            ->Where('created_at', '>', Carbon::now()->subDays(30) )
            ->SimplePaginate(5);
//            ->take(5)
//            ->get();

        return $new_pictures;
    }

public function get_person_from_user(User $user)
{
    $person = Person::findOrNew($user->person_id);
    return $person;
}

    public function home()
    {
        $user =  \Auth::user();

        $person = HomeController::get_person_from_user($user);
        $birthday_people = HomeController::get_birthday_people();
        $new_pictures = HomeController::get_recently_added_pictures();

        $activity =  Activity::orderBy('created_at', 'desc')->with(['user', 'subject'])
            ->Where('created_at', '>', Carbon::now()->subDays(30) )
            ->SimplePaginate(10);

        return view ('pages.home', compact('user', 'person', 'birthday_people', 'new_pictures', 'activity'));
    }


    public function account()
    {
        $user =  \Auth::user();

        $person = Person::all()
            ->Where('id', $user->person_id)
            ->first();

        $notes_added = HomeController::get_notes_added_by_person($person);
        $updates_suggested = HomeController::get_updates_from_user($user);

        $activity = $user->activity()->with(['user', 'subject'])->SimplePaginate(5);

        return view ('pages.account', compact('user', 'notes_added', 'updates_suggested', 'activity', 'person'));
    }


    public function help()
    {
        $user =  \Auth::user();
        return view ('pages.help', compact('user'));
    }

    public function admin()
    {
        $user =  \Auth::user();

        return view ('pages.admin', compact('user'));
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


    public function history()
    {
        $user =  \Auth::user();
        return view ('pages.history', compact('user'));
    }

    public function contact()
    {
        return view ('pages.contact');
    }

//    public function register()
//    {
//        return view ('pages.register');
//    }
//
//    public function process_registration_request($request)
//    {
//
//        $request_info = ($request->all());
//
//
//        $user_who_made_update =  \Auth::user();
//        $diane_user = User::find(1);
//
//        $this->mailer->registration_request_notify($diane_user, $request_info);
//
//        flash()->success('Your request has been sent, check email for response');
//
//        return redirect('landing');
//    }

}