@extends('default')

@section('content')


    <div style="float: left; width: 33%;">

        {{--Originally I had logic to look for image->std_name first, but I don't know why this would be desired for config page- removed--}}
        <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded" , "height" => "270"));
        ?>


        <br/>
@if($image->subject)
        <b>Person link:  </b> <a href="/people/{{ $image->subject}}"> {{ $image->subject}} </a><br/>
@endif
        @if($image->family)
            <b>Family link:  </b> <a href="/families/{{ $image->family}}"> {{ $image->family}} </a><br/>
        @endif

        <br/><br/>
        <a href="/images">Back to image list</a>
    </div>


    <div style="float: left; width: 33%;">

    {{-- Doing it the right way (passing $image) made a bug where I was updating ALL images (so keep other way below)--}}
        {{--{!! Form::model($image, ['route' => ['images.update', $image], 'method' => 'PATCH']) !!}--}}

        {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'PATCH']) !!}

        @include ('errors.list')
        <br/>

        @include ('image/partials._image_form')
        @include ('partials._family_bools')

            <div class="form-group">
                {!! Form::submit('Update Image', ['class' => 'btn btn-primary']) !!}


            </div>
        {!! Form::close() !!}
        </div>


    <div style="float: left; width: 33%;">
        <br/>
        <b> People:  </b>  <br/>

        {{--An image either has exactly one person or one family, or it has a one-to-many associations with people.--}}
        {{--The first type is editable in the form already (saved to the image itself), the second type uses image_person table--}}

        @if ( ($image->subject) or ($image->family))
            {{--Show person link:--}}
            @if ($image->subject)
                Associated person: <a href="{{ action('PeopleController@show', [$image->subject]) }}">here</a>
            @endif

            {{--Show family link:--}}
            @if ($image->family)
                Associated family: <a href="{{ action('FamilyController@show', [$image->family]) }}">here</a>
            @endif

        @else


    {{--We have a picture with invidual person associations- list everyone associated --}}
            @foreach($image->people as $person)
                @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])<br/>
            @endforeach
            <br/>


    {{--If picture doesn't have specified person/family, show option to associate more people (one-to-many)--}}
        Associate a new person with this picture <br/>

        (to do)
        {{-- Doing it the right way (passing $image) made a bug where I was updating ALL images (so keep other way below)--}}
        {{--{!! Form::model($image, ['route' => ['images.update', $image], 'method' => 'PATCH']) !!}--}}

        {{--{!! Form::model($image, ['route' => ['images.add_person_association', $image->id], 'method' => 'POST']) !!}--}}

        {{--@include ('errors.list')--}}
        {{--<br/>--}}
        {{--@TODO: will need to add a record in image_person, will need route for that--}}
        {{--@TODO: will make a partial for this when I'm done--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::submit('Add person', ['class' => 'btn btn-primary']) !!}--}}


        {{--</div>--}}
        {{--{!! Form::close() !!}--}}

        @endif

    </div>
@stop