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

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
//    public function store(CreatePersonRequest $request, Person $person)
//    {
//        $person->create($request->all());
//        return redirect()->route('person.index');
//    }

    public function store(SavePersonRequest $request)
    {
        Person::create($request->all());
        return redirect('people');
    }

    //TODO: update doc blocks (everywhere) when things have solidified

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
//    public function show($id)
    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view ('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
//    public function edit(Person $person)
//    {
//        $person = Person::findOrFail($person);
//        return view('person.edit', compact('person'));
//    }
    public function edit($id)
    {
        $person = Person::findOrFail($id);
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, SavePersonRequest $request)
    {

      $person = Person::findOrFail($id);
        $person->update($request->all());

        return redirect('people');
    }

//    public function update(Person $person, Request $request)
//    {
//        $person->fill($request->input())->save();
//        return redirect('person');
//    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index');
    }
}
