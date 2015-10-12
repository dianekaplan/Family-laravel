<?php

namespace App\Http\Controllers;

use App\Person;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\SavePersonRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PeopleController extends Controller
{
    public function index()
    {
//        $people = Person::all();
        $people = Person::latest('created_at')->displayable()->get();

        //will want to figure out how to show in alphabetical order
        //$people = Person::order_by('last');
        //actually, may happen on the view instead

        return view('person.index', compact('people'));
    }


    //TODO: update doc blocks (everywhere) when things have solidified

    public function show(Person $person)
    {
        return view ('person.show', compact('person'));
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


    public function update(Person $person, SavePersonRequest $request)
    {

        $person->update($request->all());
        $this->syncTags($person, $request->input('tag_list'));

        flash()->success('Your edit has been saved');

        return redirect('people');
    }

    private function syncTags(Person $person, array $tags)
    {
        $person->tags()->sync($tags);
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

    public function get_kaplans()
    {
//        return people where kaplan_bool is true
        $people = Person::kaplans('created_at')->kaplans()->get();
//        return view('person.index', compact('people'));
        return $people;
    }

}
