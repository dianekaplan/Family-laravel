@extends('default')

@section('content')


        <img src="http://newribbon.com/family/images/{{ $image->big_name  }}"> <br/>
        {{ $image->caption  }}
    ({{ $image->year}})




        {{--@TODO: look up imageperson for this image_id and do something like:--}}

        @foreach($image->people as $person)

            <li><a href="/people/{{ $person->id  }}">{{$person->first }} {{$person->last}}</a></li>
            @endforeach



@stop