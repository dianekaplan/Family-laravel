<?php

namespace App\Http\Controllers;

use App\Image;
use App\Story;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{


    public function convert($string)
    {

        $conn = pg_connect('db connection string here');

        $text = pg_escape_literal($conn, htmlentities('<html><head></head><body><em>test</em></body></html>'));

        pg_query($conn, 'TRUNCATE TABLE test');
        pg_query($conn, "INSERT INTO test VALUES ( {$text} )");

        $result = pg_query($conn, 'SELECT * FROM test');

        $row = pg_fetch_row($result);
        pg_close($conn);

        $string = $row[0];

        echo html_entity_decode($string);
    }





    public function __construct()
    {
        $this->middleware('auth');
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
        $story = Story::find($id);

//        $content = htmlspecialchars_decode($story->text);
//        $content = StoryController::convert($story->text);
        $content = ($story->text);
//        htmlentities


        return view ('story/show',  compact('story', 'content'));
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
