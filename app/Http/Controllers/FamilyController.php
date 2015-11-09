<?php

//namespace App\Http\Requests;
namespace App\Http\Controllers;

use App\Family;
use App\Person;
use App\Image;
use App\Http\Requests;
use App\Http\Requests\SaveFamilyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::all();
//        $families = Family::latest('created_at')->get();

        $kaplan_families = Family::kaplans('created_at')->get();
        $keem_families = Family::keems('created_at')->get();
        $kemler_families = Family::kemlers('created_at')->get();
        $husband_families = Family::husbands('created_at')->get();

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

    public function get_kids_of_family($family)
    {
        $kids = Person::where('family_of_origin', $family->id)
            ->orderBy('sibling_seq')
            ->get();
        return $kids;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        $id = $family->id;

        $mother =  Person::latest('created_at') ->where('id', '=', $family->mother_id)->first();
        $father =  Person::latest('created_at') ->where('id', '=', $family->father_id)->first();

        $kids = FamilyController::get_kids_of_family($family);

        $images = Image::where('family', $id)
            ->orderBy('year', 'asc')
            ->get();

        $featured_image = Image::latest('created_at')
            ->orderBy('year', 'asc')
            ->Where('family', $id)
            ->Where ('featured', 1)
            ->get();

        return view ('family.show', compact('family', 'kids', 'images', 'mother', 'father', 'featured_image'));
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
