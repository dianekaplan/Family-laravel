<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
Use App\Activity;

class ActivitiesController extends Controller
{
    public function show(User $user)
    {
//        dd( $user->activity);
        $activity =  $user->activity();
        return view ('activity.show', compact('activity'));
    }

    public function index()
    {
        $activity =  Activity::orderBy('created_at', 'asc')->with(['user', 'subject'])->get();
        return view ('activity.show', compact('activity'));
    }
}
