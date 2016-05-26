<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
use App\Family;
use Illuminate\Support\Collection;

class OutlineController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *  for each of the original families: get from cache, or call get_descendants() and save results
     */
    public function show_outline()
    {
        $user = \Auth::user();
//        $original_families = Family::original('created_at')->get();
        $original_keems = Family::keems('created_at')->original()->get();
        $original_husbands = Family::husbands('created_at')->original()->get();
        $original_kemlers = Family::kemlers('created_at')->original()->get();
        $original_kaplans = Family::kaplans('created_at')->original()->get();

        $test_family = Family::find(132);
//        $test_kid = Family::find(86);
//        $results = null;
//        $results = [$test_family];  // if it starts null, exception when we try to push on null
        $results = [];
        // https://laravel.com/docs/5.1/collections#method-push
//        $results->push(FamilyController::get_descendants($test_family, $results));
//        $results = collect (FamilyController::get_descendants($test_family, $results));

        $counter = 0;
//        array_push($results, FamilyController::get_descendants($test_family, $results));
        $results =  FamilyController::get_descendants($test_family, $results, $counter);

        dd($results);

//        foreach ($original_keems as $family)
//        {
//                FamilyController::get_descendants($family, $results);
//        }

        OutlineController::save_value();
        $test = Cache::get('key');

        return view('pages.outline', compact('user', 'original_keems', 'original_husbands', 'original_kemlers',
            'original_kaplans', 'results', 'test'));
//        return view('pages.outline', compact('user', 'original_keems', 'original_husbands', 'original_kemlers',
//            'original_kaplans', 'test'))->with(array('results' => $results));
    }

    public static function save_value()
    {
//
//        Cache::flush();

        Cache::put('key', 'value we saved', 10);
        Cache::forever('key', 'value we saved'); // remove with 'Cache::forget('key')', or Cache::flush();
    }

}
