<?php

namespace App\Http\Controllers;

use App\Person;
use App\Tag;
use App\Image;
use App\Family;
use App\Note;
use App\Http\Requests;
use App\Http\Requests\SavePersonRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class PeopleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'landing']);
    }


    public function index()
    {
//        $people = Person::latest('created_at')
//            ->displayable()
//            ->orderBy('last', 'asc', 'first', 'asc')
//            ->get();

        $kaplans = Person::kaplans('created_at')->displayable()->get();
        $keems = Person::keems('created_at')->displayable()->get();
        $kemlers = Person::kemlers('created_at')->displayable()->get();
        $husbands = Person::husbands('created_at')->displayable()->get();;

        return view('person.index', compact('people', 'kaplans', 'keems', 'husbands', 'kemlers'));
    }


    //TODO: update doc blocks (everywhere) when things have solidified

//    @FIXME: still not showing families in order of sequence (see mom's page')
    public function get_made_family($person)
    {
        $made_family = Family::where('mother_id', $person->id)
            ->orWhere('father_id', $person->id)
            ->orderBy('sequence', 'asc')
            ->get();

        return $made_family;
    }

    public function get_notes_about_person($person)
    {
        $notes = DB::table('notes')
            ->leftjoin ('people', 'people.id', '=', 'notes.author')
            ->Where('type', 1)
            ->Where('ref_id', $person->id)
            ->Where('active', true)
            ->orderBy('for_self', 'desc', 'date', 'asc')
            ->get();

        return $notes;
    }


    public function show(Person $person)
    {
        $logged_in_user =  \Auth::user();

        $id = $person->id;
        $solo_images =  Image::where('subject', $id)
            ->orderBy('year', 'asc')
            ->get();

        $featured_image = Image::where('subject', $id)
            ->orderBy('year', 'asc')
            ->Where ('featured', 1)
            ->get();

        $made_family = PeopleController::get_made_family($person);
        $notes = PeopleController::get_notes_about_person($person);

        $origin_family = Family::where('id', $person->family_of_origin)->first();

        return view ('person.show', compact('person', 'solo_images', 'made_family', 'featured_image', 'origin_family', 'notes', 'logged_in_user'));
    }


    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view ('person.create', compact ('tags'));
    }

    public function store(SavePersonRequest $request)
    {
        $this->createPerson($request);

//        flash()->success('You successfully added a person');
        flash()->overlay('You successfully added a person', 'Thank you');

        return redirect('people');
    }


    public function edit(Person $person)
    {
        $tags = Tag::lists('name');
        return view('person.edit', compact('person', 'tags'));
    }


    public function landing()
    {

        $people = Person::ShowOnLandingPage('created_at')
            ->displayable()
            ->orderBy('last', 'asc', 'first', 'asc')
            ->get();

        return view ('person.landing', compact('people'));
    }


    public function update(Person $person, SavePersonRequest $request)
    {
        $person->update($request->all());
        $this->syncTags($person, $request->input('tag_list'));

        flash()->success('Your edit has been saved');

        return redirect('people');
    }


    private function createPerson(SavePersonRequest $request)
    {
        $person = Person::create($request->all());

        $this->syncTags($person, $request->input('tag_list'));
        return $person;
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index');
    }

//
//        Image::latest('created_at')->where('subject', '=', '$person->id')->get();


    private function syncTags(Person $person, array $tags)
    {
        $person->tags()->sync($tags);
    }

}
