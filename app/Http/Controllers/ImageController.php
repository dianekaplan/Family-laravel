<?php

namespace App\Http\Controllers;

use App\Image;
use App\Person;
use App\Family;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;


class ImageController extends Controller
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
        $minutes = 10080; // 1440 minutes in a day, 10080 in a week
        $images = null;

        $images = Cache::remember('images', $minutes, function(){
            return Image::orderBy('year', 'asc')->get();
        });

        return view ('image/index',  compact('images'));
    }


    public function album()
    {
        $user =  \Auth::user();

        $images = new Collection;

        if($user->keem_access) {$images = $images->merge(Image::keems()->get());}
        if($user->husband_access) {$images = $images->merge(Image::husbands()->get());}
        if($user->kemler_access){$images = $images->merge(Image::kemlers()->get());}
        if($user->kaplan_access) {$images = $images->merge(Image::kaplans()->get());}

        $images= $images->unique();
        $images = $images->sortBy('year');

        return view ('image/album',  compact('images'));
    }

    public function get_image_people($id)
    {
        $image = Image::find($id);
        $people = $image->people;

        // If there's a subject set, replace $people with that person
        if($image->subject != null)
            {
                $people = [Person::find($image->subject)];
            }

        // If there's a family set, replace $people with those family members
        if($image->family != null)
        {
            $family = Family::find($image->family);
            $mother = Person::find($family->mother_id);
            $father = Person::find($family->father_id);
            $kids = FamilyController::get_kids_of_family($family);

            $people = $kids;
            $people->push($mother);
            $people->push($father);
        }

        return response()->json($people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);

        return view ('image/show',  compact('image'));
    }



    public function configure($id)
    {
        $image = Image::find($id);

        return view ('image/configure',  compact('image'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Image $image, Request $request)
    {
        $image->update($request->all());
        $user_who_made_update =  \Auth::user();
        $diane_user = User::find(1);
        flash()->success('Your edit has been saved');

//        return redirect('people');
//        return redirect()->back();
        return redirect()->route('image.configure', [$image]);
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
