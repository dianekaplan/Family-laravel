<?php

//namespace App\Http\Requests;
namespace App\Http\Controllers;

use App\Family;
use App\Person;
use App\Image;
use App\Http\Requests;
use App\Http\Requests\SaveFamilyRequest;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;  //not sure if this is being used, PeopleController doesn't have it
use Acme\Mailers\UserMailer as Mailer;
use App\User;
use App\Note;

class FamilyController extends Controller
{

    protected $mailer;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth');

        $this->mailer= $mailer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::all();

        $kaplan_families = Family::kaplans()->get();
        $keem_families = Family::keems()->get();
        $kemler_families = Family::kemlers()->get();
        $husband_families = Family::husbands()->get();

        return view('family.index', compact('families', 'kaplan_families', 'keem_families', 'kemler_families', 'husband_families'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view ('family.create');
    }

    /**
     * @param SaveFamilyRequest $request
     * @return static
     */
    private function createFamily(SaveFamilyRequest $request)
    {
        $family = Family::create($request->all());
        return $family;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveFamilyRequest $request)
    {
        $this->createFamily($request);

        flash()->overlay('You successfully added a family', 'Thank you');

        return redirect('families');
    }

    /**
     * @param $family
     * @return mixed
     */
    public static function get_kids_of_family($family)
    {
        $kids = Person::where('family_of_origin', $family->id)
            ->orderBy('sibling_seq', 'asc')
            ->get();
        return $kids;
    }

    /**
     * @param $person
     * @return mixed
     */
    public static function get_families_person_made($person)
    {
        $families = Family::where('mother_id', $person->id)
            ->orWhere('father_id', $person->id)
            ->orderBy("sequence", "asc")
            ->get();
        return $families;
    }

    /**
     * @param $family
     * @return mixed
     */
    public static function get_descendants(Family $family, $results_array, $counter)
    {
        // start new round with a different temp array, to keep track
        $counter++;
        $this_array = "array_$counter";
        $$this_array = [];

        print("<br/> Counter: " . $counter . "<br/>");
        print($family->caption . " ");

        $this_array = "array_$counter";
//        print("<br/> Array name: " . $this_array . "<br/>");
        $$this_array = [];

//        array_push ($results_so_far, $family->caption);
        array_push ($$this_array, $family->caption);

        $descendants = FamilyController::get_kids_of_family($family);


        // if family has no kids, return 0;
        if (!count($descendants))
        {
            return 0;
        }

        else // add kids and check for their families
        {
            foreach ($descendants as $kid) {
                print($kid->first . "<br/> ");
                array_push ($$this_array, $kid->first);
//                $results_so_far->push($kid);
//                array_push ($temp_array, $kid->first);

                // get families made by kid- for each one, call get_descendants
                $families_made = FamilyController::get_families_person_made($kid);
                foreach ($families_made as $new_family) {
//                    FamilyController::get_descendants($new_family, $results_array, $counter);
                    $round_results = FamilyController::get_descendants($new_family, $results_array, $counter);
                    array_push ($results_array, $round_results);
                }
            };

            // we've gone through the kids, add this round's array to the general results array
            array_push ($results_array, $$this_array);
        }
        return $results_array;
    }

    /**
     * @param $family
     * @return mixed
     */
    protected function get_notes_about_family($family)
    {
        $notes = Note::Where('type', 2)
            ->leftjoin ('people', 'people.id', '=', 'notes.author')
            ->Where('ref_id', $family->id)
            ->orderBy('for_self', 'desc', 'date', 'asc')
            ->get();

        return $notes;
    }


    /**
     * @param Family $family
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Family $family)
    {
        $id = $family->id;

        $mother =  Person::where('id', '=', $family->mother_id)->first();
        $father =  Person::where('id', '=', $family->father_id)->first();
        $kids = FamilyController::get_kids_of_family($family);
//        $kids = Family::get_kids_of_family($family);
        $notes = FamilyController::get_notes_about_family($family);

        $images = Image::where('family', $id)
            ->orderBy('year', 'asc')
            ->get();

        $featured_image = Image::where('featured', 1)
            ->Where('family', $id)
            ->orderBy('year', 'asc')
            ->get();

        return view ('family.show', compact('family', 'kids', 'images', 'mother', 'father', 'featured_image', 'notes'));
    }

    /**
     * @param Family $family
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Family $family)
    {
        return view('family.edit', compact('family'));
    }

    /**
     * @param Family $family
     * @param SaveFamilyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Family $family, SaveFamilyRequest $request)
    {
        $family->update($request->all());

        $user_who_made_update =  \Auth::user();
        $diane_user = User::find(1);

        $this->mailer->family_update_notify($diane_user, $request, $user_who_made_update, $family);
        $this->mailer->family_update_thankyou($user_who_made_update, $request, $family);

        flash()->success('Your edit has been saved');

        //        return redirect('people');
//        return redirect()->back();
//                return redirect('families');
        return redirect()->route('families.show', [$family]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        $family->delete();
        return redirect()->route('family.index');
    }
}
