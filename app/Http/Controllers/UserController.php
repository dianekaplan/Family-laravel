<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests\SaveUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super');
    }

    public function showProfile(Request $request, $id)
    {
        $value = $request->session()->get('key');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('active_bool', true)->orderBy('last_login', 'desc')->get();

        $recent_visitors = User::where('last_login', '>', Carbon::now()->subDays(30) )->orderBy('last_login', 'desc')->get();

        $never_seen = User::whereNULL('last_login' )->orderBy('name', 'asc')->get();
        $users_on_old_site_only = User::where('last_login', '<', '2015-12-01' )->orderBy('last_login', 'desc')->get();
        $logged_in = User::where('last_login', '>', '2015-12-01' )->orderBy('last_login', 'desc')->get();
        $users_with_activity = User::has('activity')->get();

        $keem_users = User::where('keem_access', true )->orderBy('name')->get();
        $husband_users = User::where('husband_access', true )->orderBy('name')->get();
        $kemler_users = User::where('kemler_access', true )->orderBy('name')->get();
        $kaplan_users = User::where('kaplan_access', true )->orderBy('name')->get();

        $confirmed_users_not_recently_bugged =  User::whereNotNULL('last_login' )
            ->where('last_login', '<', Carbon::now()->subMonths(3))
             ->where('last_pestered', '<', Carbon::now()->subMonths(3))
             ->orderBy('last_pestered', 'desc')->get();

        return view('user.index', compact('users', 'recent_visitors', 'never_seen', 'logged_in', 'users_with_activity', 'users_on_old_site_only', 'keem_users',
            'husband_users', 'kemler_users', 'kaplan_users', 'confirmed_users_not_recently_bugged'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SaveUserRequest $request)
    {
        User::create($request->all());
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

//    public function show(User $user)
//    {
//        return view ('user.show', compact('user'));
//    }

//TODO: at some point figure out why the above way didn't work (for users, and images)


    public function show($id)
    {
        $user = User::find($id);
        return view ('user.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SaveUserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
