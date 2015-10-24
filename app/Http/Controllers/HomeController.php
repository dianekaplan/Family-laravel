<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 9/5/2015
 * Time: 9:38 AM
 */

namespace App\Http\Controllers;

//use App\Http\Controllers\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Person;

class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'landing']);
        //$this->middleware('auth', ['only' => 'create']);
    }


    public function index()
    {
        return view ('welcome');
    }


    public function contact()
{

    return view ('pages.contact');
}



    public function home()
    {
        $user =  \Auth::user();
        $person = Person::latest('created_at')
            ->Where('id', $user->person_id)
            ->first();


        return view ('pages.home', compact('user', 'person'));
    }

    public function account()
    {
        $user =  \Auth::user();

        return view ('pages.account', compact('user'));
    }

}