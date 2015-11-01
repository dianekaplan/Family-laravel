<?php

namespace App\Http\Controllers;

use App\Image;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{

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
        $images = Image::all();
        return view ('image/index',  compact('images'));
    }

//    public function cloudinary_upload_from_newribbon($little_name)
//    {
////        $little_name = $image->little_name;
//////        \Cloudinary\Uploader::upload("http://newribbon.com/family/images/"($little_name));
////        \Cloudinary\Uploader::upload("http://newribbon.com/family/images/2006gus.jpg");
////        $last_image = Cloudder::getResult();
//
//        $image_name = "1900_Nathan.jpg";
//        $cloud_name = 'hnyiprajv';
//
//    echo cl_image_tag($image_name, array( "alt"   => "Sample Image" , "cloud_name" => $cloud_name));
//
//    }

    public function show_image_from_cloudinary($image_name)
    {
//        $little_name = $image->little_name;
////        \Cloudinary\Uploader::upload("http://newribbon.com/family/images/"($little_name));
//        \Cloudinary\Uploader::upload("http://newribbon.com/family/images/2006gus.jpg");
//        $last_image = Cloudder::getResult();

        $cloud_name = 'hnyiprajv';

        return cl_image_tag($image_name, array(  "cloud_name" => $cloud_name));

    }

//    public function clouder_upload()
//    {
//        $filename = test;
//        $publicID = test;
//        $options = test;
//        $tags = test;
//
//        Cloudder::upload($filename, $publicID, $options, $tags);
//    }


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
        $image = Image::find($id);

        return view ('image/show',  compact('image'));
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
