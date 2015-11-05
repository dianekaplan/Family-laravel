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

//    public function get_month_bit($date)
//    {
////        @FIXME: extract() expects parameter 1 to be array, string given
//        $month_bit = extract('month', $date);
//        return $month_bit;
//    }


public function get_birthday_people()
{
    $birthday_people = Person::all()
//        ->whereMonth('birthdate', '=', Carbon::now()->month)
//        ->where("extract(MONTH from birthdate)", "=", \Carbon\Carbon::now()->month)
        ->where ('birthdate', 'starts_with', '11')
//        ->Where("extract('month', birthdate)", "=", \Carbon\Carbon::now()->month)
        ->Where('active', true)->first();


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
            ->Where('created_at', '>', \Carbon\Carbon::now()->subDays(7) )
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
//
//        $notes_added = HomeController::get_notes_added_by_person($person);
//        $updates_suggested = HomeController::get_updates_from_user($user);

//        $month_bit = HomeController::get_month_bit($person->birthdate);
        $birthday_people = HomeController::get_birthday_people();
        $new_pictures = HomeController::get_recently_added_pictures();

//        return view ('pages.home', compact('user', 'person', 'notes_added', 'updates_suggested'));
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