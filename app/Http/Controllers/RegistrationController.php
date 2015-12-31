<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Acme\Mailers\UserMailer as Mailer;
use App\Person;

class RegistrationController extends Controller
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer= $mailer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request_info = Request::all();

        $user_who_made_update =  \Auth::user();
        $diane_user = User::find(1);

        $this->mailer->registration_request_notify($diane_user, $request_info);

//        flash()->success('Your request has been sent, check email for response');
        flash()->overlay('Your request has been sent, I will respond soon');

        return redirect('landing');
    }


    public function register()
    {
        $people = Person::ShowOnLandingPage()
            ->displayable()
            ->orderBy( 'last', 'asc')
            ->orderBy( 'first', 'asc')
            ->get();


        return view ('pages.register', compact('people'));
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
        //
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
