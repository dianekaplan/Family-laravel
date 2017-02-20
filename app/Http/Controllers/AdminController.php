<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;  // This one seems older, can use this way except can't be called statically:
//https://laravel.com/docs/5.1/requests#basic-request-information

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Support\Facades\DB;
use Acme\Mailers\UserMailer as Mailer;
use App\User;  // need this to grab my user for notification mail

class AdminController extends Controller
{

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->middleware('auth');
        $this->middleware('super');
        $this->mailer= $mailer;
    }

    public function admin_edit_person($id)
    {
        $person_to_update = Person::find($id);
        return view('admin.edit_person', compact('person_to_update'));
    }

    public function admin_edit_family($id)
    {
        $family_to_update = Family::find($id);
        return view('admin.edit_family', compact('family_to_update'));
    }

    public function mail_form()
    {
        return view('admin.email_sender');
    }

    public function send_mail()
    {
        $request_info = Request::all();
        $diane_user = User::find(1);

        $this->mailer->general_notify($diane_user, $request_info);
        $this->mailer->general_send($request_info);

//        flash()->overlay('Your message has been sent!');

        return redirect('admin');
    }

    public function tableview()
    {
        $highest_image_id = AdminController::get_last_id_used('images');
        $highest_person_id = AdminController::get_last_id_used('people');
        $highest_family_id = AdminController::get_last_id_used('families');
        $highest_image_person_id = AdminController::get_last_id_used('image_person');
        $highest_activities_id = AdminController::get_last_id_used('activities');
        $highest_video_id = AdminController::get_last_id_used('videos');
        $highest_story_id = AdminController::get_last_id_used('stories');
        $highest_note = AdminController::get_last_id_used('notes');
        $highest_user = AdminController::get_last_id_used('users');
        $highest_login = AdminController::get_last_id_used('logins');
        $highest_audiofile = AdminController::get_last_id_used('audiofiles');
        $highest_family_story = AdminController::get_last_id_used('family_story');
        $highest_person_story = AdminController::get_last_id_used('person_story');
        $highest_person_video = AdminController::get_last_id_used('person_video');
//        $highest_family_video = AdminController::get_last_id_used('family_video');
        $highest_audiofile_person = AdminController::get_last_id_used('audiofile_person');

        $most_recent_image =  DB::table('images')
            ->orderBy( 'id', 'last')  // same as id desc
            ->take(1)
            ->get();

        $most_recent_image_name = $most_recent_image[0]->big_name;

        return view ('admin.table_view', compact('highest_image_id', 'highest_person_id', 'highest_family_id', 'highest_image_person_id',
            'highest_activities_id', 'highest_video_id', 'highest_story_id', 'highest_note', 'highest_user', 'highest_login', 'highest_audiofile',
            'highest_family_story', 'highest_person_story', 'highest_person_video', 'highest_audiofile_person', 'most_recent_image_name'));
    }


    public function get_last_id_used($tablename)
    {
        $highest_id = DB::table($tablename)
            ->orderBy( 'id', 'last')  // same as id desc
            ->take(1)
            ->get();

        $highest_id = $highest_id[0]->id;
        return $highest_id;
    }

    public function clear_cache()
    {
        Cache::flush();
    }

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
