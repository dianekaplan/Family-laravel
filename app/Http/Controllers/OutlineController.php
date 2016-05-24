<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;

class OutlineController extends Controller
{

    public static function save_value()
    {
//
//        Cache::flush();

        Cache::put('key', 'value we saved', 10);
        Cache::forever('key', 'value we saved'); // remove with 'Cache::forget('key')', or Cache::flush();
    }


}
