<?php

//namespace App\Http\Requests;
namespace App\Http\Controllers;

use App\Family;
use App\Http\Requests;
use App\Http\Requests\SaveFamilyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $people = Person::all();
        $families = Family::latest('created_at')->get();

        return view('family.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view ('family.create');
//        return view ('family.create', compact('family'));
    }


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

//        flash()->success('You successfully added a person');
        flash()->overlay('You successfully added a family', 'Thank you');

        return redirect('families');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
//        dd($family);
//        return $family;
        return view ('family.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        return view('family.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Family $family, SaveFamilyRequest $request)
    {

        $family->update($request->all());

        flash()->success('Your edit has been saved');

        return redirect('families');
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
