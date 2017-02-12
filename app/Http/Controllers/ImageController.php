<?php

namespace App\Http\Controllers;

use App\Image;
use App\Person;
use App\Family;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Cache;
use App\Http\Requests\SaveImageRequest;
use DB;


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

        // @TODO PUT THIS BACK ONCE YOU'RE DONE WITH CREATE IMAGE PAGE
//        $images = Cache::remember('images', $minutes, function(){
//            return Image::orderBy('year', 'asc')->get();
//        });

        $images = Image::orderBy('year', 'asc')->get();


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
        // want to just do this, but should not be called statically
        //$latest_image_id = AdminController::get_last_id_used('images');

       $latest_image_id = DB::table('images')
           ->orderBy( 'id', 'last')  // same as id desc
            ->take(1)
            ->get();

        $latest_image_id = $latest_image_id[0]->id;
        $next_image_id = $latest_image_id + 1;

        return view ('image.create', compact('next_image_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//https://laravel.com/docs/5.1/eloquent
    public function store(SaveImageRequest $request)
    {
        Image::create($request->all());
        return redirect('images');
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
//    public function edit($id)  //handled by configure (will edit the image fields AND associate people)
//    {
////        $image = Image::find($id);
////        return view('image.configure', compact('image'));
//    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, SaveImageRequest $request)
    {
        $image = Image::find($id);
        $image->update($request->all());

        flash()->success('Your edit has been saved');

        // doing it the right way (of passing Image $image) made a bug where ALL images where updated
        // (so leave it this $id way)
        // doing this succeeded but updated ALL images with the new one
//        $image->update($request->except(['_method', '_token']));

        return redirect('images');
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
