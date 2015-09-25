<?php

namespace App\Http\Controllers;

use App\Person;
use App\Http\Requests;
use App\Http\Requests\SavePersonRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $people = Person::all();
        $people = Person::latest('created_at')->displayable()->get();

        //will want to figure out how to show in alphabetical order
        //$people = Person::order_by('last');

        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('person.create');
    }

    public function store(SavePersonRequest $request)
    {
        Person::create($request->all());

//        flash()->success('You successfully added a person');
        flash()->overlay('You successfully added a person', 'Thank you');

        return redirect('people');

    }

    //TODO: update doc blocks (everywhere) when things have solidified

    public function show(Person $person)
    {
        return view ('person.show', compact('person'));
    }


    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }


    public function update(Person $person, SavePersonRequest $request)
    {

        $person->update($request->all());

        flash()->success('Your edit has been saved');

        return redirect('people');
    }


    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index');
    }
}
