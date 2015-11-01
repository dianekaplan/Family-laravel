@extends('default')

@section('content')
    <h3>Images</h3>

    @if (count($images))

        @foreach ($images as $image)
            <li><a href="{{ action('ImageController@show', [$image->id]) }}">{{ $image->little_name }}</a>
                -  Show from cloudinary
                <a href="{{ action('ImageController@show_image_from_cloudinary', [$image->big_name]) }}">here</a>
                {{--- Mark as updated--}}
                {{--<a href="{{ action('UpdateController@setAdded', [$update->id]) }}">here</a>--}}

            </li>

        @endforeach
    @endif
    <br/>
