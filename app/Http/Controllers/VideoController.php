<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function album()
    {
        $user =  \Auth::user();

        $videos = new Collection;

        if($user->keem_access) {$videos = $videos->merge(Video::keems()->get());}
        if($user->husband_access) {$videos = $videos->merge(Video::husbands()->get());}
        if($user->kemler_access){$videos = $videos->merge(Video::kemlers()->get());}
        if($user->kaplan_access) {$videos = $videos->merge(Video::kaplans()->get());}

        $videos= $videos->unique();
        $videos = $videos->sortBy('year');

        return view ('video/album',  compact('videos'));
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
        $video = Video::find($id);

        return view ('video/show',  compact('video'));
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
    public function update(Request $request, $id)
    {
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
