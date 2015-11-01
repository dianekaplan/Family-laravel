@extends('default')

@section('content')

    <h3>{{$story->description}}</h3>



        <div class="media">
            @if($story->image)
            <div class= "media-left">
                {{--originally used class "media-object", but switched to rounded for corners, and the wrapping still works--}}
                <img class="img-rounded"  src="/stories/{{$story->image}}"/>
            </div>
            @endif

            <div class = "media-body">
{{--{{ $story->text}}--}}
                {{$content}}



            </div>
        </div>



