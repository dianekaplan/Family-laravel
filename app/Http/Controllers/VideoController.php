<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use DB;

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
//        $videos = $videos->sortBy('year');
        //Collections only have sortBy for one thing, so I got this idea from here:
        //http://stackoverflow.com/questions/25451019/what-is-the-syntax-for-sorting-an-eloquent-collection-by-multiple-columns?rq=1
        $videos = $videos->sortBy(function($sort) {
            return sprintf('%-12s%s', $sort->year, $sort->caption);
        });

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

        return view ('video/show',  compact('video', 'appearance_notes'));
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
