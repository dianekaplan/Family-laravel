@extends('default')

@section('content')

    <h3>{{$story->description}}</h3>

    <div class="media width: 100%;">
            {{--@if($story->image)--}}
            {{--<div class= "media-left">--}}
                {{--originally used class "media-object", but switched to rounded for corners, and the wrapping still works--}}
                {{--<img class="img-rounded"  src="/stories/{{$story->image}}"/>--}}
            {{--</div>--}}
        {{--@endif--}}

                <div class="media-body width: 100%;">
{{--{{ $story->text}}--}}
                {{--{{$content}}--}}
                    {{--{{$story->text}}--}}
                    {{--Slug link: {{$slug_link}}<br/>--}}
{{--Here it comes:--}}
                    {{--@include ('story.partials._glazersCivilWar')--}}
                    {{--@include ('story.partials._'$slug_link)--}}
                    @include ($partial_display_link)

            </div>
        </div>



@stop
