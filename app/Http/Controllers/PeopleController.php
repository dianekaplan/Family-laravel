<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Tag;
use App\Image;
use App\Family;
use App\Note;
use App\User;
use App\Http\Requests\SavePersonRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Acme\Mailers\UserMailer as Mailer;

use App\Update;


class PeopleController extends Controller
{

    protected $mailer;
    protected $updated_person;
//    protected $save_person_request;

    public function __construct(Mailer $mailer, Person $updated_person)
    {
        $this->middleware('auth');

        $this->mailer= $mailer;
        $this->updated_person= $updated_person; //not sure if I'm still using this
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

    public function update(Person $updated_person, SavePersonRequest $request)
    {
        $updated_person->update($request->all());
//        $this->syncTags($person, $request->input('tag_list'));

        $user_who_made_update =  \Auth::user();

        $diane_user = User::find(1);

        $this->mailer->person_update_notify($diane_user, $request, $user_who_made_update, $updated_person);
        $this->mailer->person_update_thankyou($user_who_made_update, $request, $updated_person);

//then have it call UpdateController::store and pass along the SavePersonRequest
        //but this is calling it statically, so I need to instantiate an (update? request?) object first
//        $update = new Update;
//        $update->user_id = $user_who_made_update->id;
//        $update->person_id = $request->id;
//        $update->summary = 'test summary';
//        $update->after = 'test after';
//        $update->save();

//        $this->updated_person->store($request);

        flash()->success('Your edit has been saved');

        return redirect('people');
    }


    private function createPerson(SavePersonRequest $request)
    {
        $person = Person::create($request->all());

//        $this->syncTags($person, $request->input('tag_list'));
        return $person;
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index');
    }


    private function syncTags(Person $person, array $tags)
    {
        $person->tags()->sync($tags);
    }

}
