<?php
/**
 * Created by PhpStorm.
 * User: Diane
 * Date: 9/5/2015
 * Time: 9:38 AM
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HomeController extends Controller {

//in the controller we'll return a view, or in a javascript application we could return a json response

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
        return view ('pages.home');
    }

}