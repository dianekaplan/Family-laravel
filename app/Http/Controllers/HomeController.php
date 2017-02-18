<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 9/5/2015
 * Time: 9:38 AM
 */

namespace App\Http\Controllers;

use App\Video;
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
use App\Login;
use Cache;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;



//use Illuminate\Routing\Controller;


class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['landing', 'register', 'test']]);
        $this->middleware('super', ['only' => 'admin']);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landing(Request $request)
    {
        $people = null;
        $minutes = 10080; // 1440 minutes in a day, 10080 in a week
        $email_passed_in =  $request->query('email');

        $people = Cache::remember('landing_page_list', $minutes, function(){
            return Person::ShowOnLandingPage()
                ->displayable()
                ->orderBy( 'last', 'asc')
                ->orderBy( 'first', 'asc')
                ->get();
        });

        return view ('pages.landing', compact('people', 'email_passed_in'));
    }

//
//    public function index()
//    {
//        return view ('welcome');
//    }


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

        $birthday_people= $birthday_people->unique();
        $birthday_people = $birthday_people->sortBy('birthdate');

        return $birthday_people;
    }

    public function get_anniversary_couples()
    {
        $user =  \Auth::user();

        $anniversary_couples = new Collection;

        if($user->keem_access) {$anniversary_couples = $anniversary_couples->merge(Family::anniversaries()->displayable()->keems()->get());}
        if($user->husband_access) {$anniversary_couples = $anniversary_couples->merge(Family::anniversaries()->displayable()->husbands()->get());}
        if($user->kemler_access) {$anniversary_couples = $anniversary_couples->merge(Family::anniversaries()->displayable()->kemlers()->get());}
        if($user->kaplan_access) {$anniversary_couples = $anniversary_couples->merge(Family::anniversaries()->displayable()->kaplans()->get());}

        $anniversary_couples= $anniversary_couples->unique();
        $anniversary_couples = $anniversary_couples->sortBy('marriage_date');

        return $anniversary_couples;
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
        $user =  \Auth::user();

        $new_pictures = new Collection;

        if($user->keem_access) {$new_pictures = $new_pictures->merge(Image::keems()->recent()->get());}
        if($user->husband_access) {$new_pictures = $new_pictures->merge(Image::husbands()->recent()->get());}
        if($user->kemler_access){$new_pictures = $new_pictures->merge(Image::kemlers()->recent()->get());}
        if($user->kaplan_access) {$new_pictures = $new_pictures->merge(Image::kaplans()->recent()->get());}
        $new_pictures= $new_pictures->unique()->take(9);

        // @TODO: Consider-
        // for multi-bool users, this approach/order may mean that we have our 7 before we even get to Kaplan pics


// PREVIOUS VERSION USING RENDER & PAGINATE- showed pagination (before I added family bool filter),
// but these are for eloquent and not collections (Need collection in order to de-dupe once we grab by family bools
//)
//        $new_pictures = Image::latest('created_at' )
//            ->Where('created_at', '>', Carbon::now()->subDays(200) )
//            ->SimplePaginate(7);

        return $new_pictures;
    }


    // Left this one using render & paginate because for now I don't want to filter by family bools
    public function get_recently_added_videos ()
    {
        $user =  \Auth::user();

        $new_videos = new Collection;

        $new_videos = Video::latest('created_at' )
            ->Where('created_at', '>', Carbon::now()->subDays(600) )
            ->SimplePaginate(1);

        return $new_videos;
    }

    // don't Need this anymore after adding user relation
//public function get_person_from_user(User $user)
//{
//    $person = Person::findOrNew($user->person_id);
//    return $person;
//}

    public function home()
    {
        $user =  \Auth::user();

        // don't need that anymore after adding user relation
//        $person = HomeController::get_person_from_user($user);

        $person = $user->person;
        $birthday_people = HomeController::get_birthday_people();
        $anniversary_couples = HomeController::get_anniversary_couples();
        $new_pictures = HomeController::get_recently_added_pictures();
        $new_videos = HomeController::get_recently_added_videos();

        $activity =  Activity::orderBy('created_at', 'desc')->with(['user', 'subject'])
            ->Where('created_at', '>', Carbon::now()->subDays(200) )
            ->SimplePaginate(10);

        return view ('pages.home', compact('user', 'person', 'birthday_people', 'new_pictures',
            'activity', 'new_videos', 'anniversary_couples'));
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

    public function logins()
    {
        $logins = Login::orderBy('created_at', 'desc')->with(['user'])->get();

        return view ('pages.logins', compact('logins'));
    }

    public function admin()
    {
        $user =  \Auth::user();

//        return view ('pages.admin', compact('user'));
        return view ('admin.admin_home', compact('user'));
    }


    public function history()
    {
        $user =  \Auth::user();
        return view ('pages.history', compact('user'));
    }


    public function test()
    {
        $videos = Video::all();
        return view ('pages.test', compact('videos'));
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