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

    public static function make_results($set_of_families)
    {
        $total_results = [];

        foreach ($set_of_families as $family) {
            $these_results = [];
            $these_results = FamilyController::get_descendants($family, $these_results, 0);
            array_push($total_results, $these_results);
        }
        return $total_results;
    }
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

        $keem_results = [];
        $husband_results = [];
        $kemler_results = [];
        $kaplan_results = [];

        $counter = 0;

        if (Cache::has('keem_results')) {
            $keem_results = Cache::get('keem_results');
            $husband_results = Cache::get('husband_results');
            $kemler_results = Cache::get('kemler_results');
            $kaplan_results = Cache::get('kaplan_results');
        }
        else {
            $keem_results = OutlineController::make_results($original_keems );
            Cache::forever('keem_results', $keem_results); // remove with 'Cache::forget('key')', or Cache::flush();

            $husband_results = OutlineController::make_results($original_husbands );
            Cache::forever('husband_results', $husband_results); // remove with 'Cache::forget('key')', or Cache::flush();

            $kemler_results = OutlineController::make_results($original_kemlers );
            Cache::forever('kemler_results', $kemler_results); // remove with 'Cache::forget('key')', or Cache::flush();

            $kaplan_results = OutlineController::make_results($original_kaplans );
            Cache::forever('kaplan_results', $kaplan_results); // remove with 'Cache::forget('key')', or Cache::flush();
        }

        return view('pages.outline', compact('user', 'original_keems', 'original_husbands', 'original_kemlers',
            'original_kaplans', 'keem_results', 'husband_results', 'kemler_results', 'kaplan_results'));

    }

}
