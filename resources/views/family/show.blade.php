@extends('default')

@section('content')
    <h3>{{$family->caption}}</h3>

    <h4>  <img  src="/icons/pencil.png" height="25"/><a href = "/families/{{$family->id}}/edit">
            @if (true)  <!--but later check permissions-->
                Update info for this family
            @endif
        </a> </h4>


    <div class="bottom">


        <div style="float: left; width: 31%;">
             @include ('family.partials._parent_link', ['person' => $mother, 'gender'=> "female"])
        </div>


        <div style="float: left; vertical-align: bottom; width: 38%;">
            @if (count($featured_image))

                @foreach($featured_image as $image)
                    @include ('partials._featured_image', ['featured_image' => $featured_image])
                @endforeach

            @endif


                <br/><br/>



        </div>


        <div style="float: left; width: 31%;">
            @include ('family.partials._parent_link', ['person' => $father, 'gender'=> "male"])
        </div>


        <div style="float: left;width: 100%;">

            <div style="float: left;width: 31%;">
            @if ($family->marriage_date)
                    <b>Marriage date:</b>
                {{ date('F d, Y', strtotime($family->marriage_date)) }}<br/>
                @elseif($family->marriage_date_note)
                   <b> Marriage date: </b>{{  $family->marriage_date_note }}<br/>

                {{--@FIXME- this is the part that makes the non-object error when I make a new record in the app (with date)--}}
                {{--@if( $family->marriage_date->month == \Carbon\Carbon::now()->month)--}}
                {{--happy anniversary, {{ $family->caption }} !--}}
                {{--@endif--}}
            @endif
                @include ('pages.add_note_link', ['user' => Auth::user(), 'type'=>'families', 'id' => $family->id, 'name'=>$family->caption])<br/>

            </div>

            <div style="float: left;width: 38%;">

                @unless($family->no_kids_bool)

                    <b>Kids: </b><br/>
                    @foreach($kids as $kid)
                        @include ('person.partials._person_link', ['person' => $kid, 'show_flag'=>'N', 'show_book'=>'Y'])<br/>
                    @endforeach

                @endunless
            </div>



        </div>
        <div style="float: left;width: 100%;">

        @if ($family->notes1) Notes 1: {!! $family->notes1 !!} @endif  <br/>
        @if ($family->notes2) Notes 2: {!!   $family->notes2  !!}  @endif  <br/>

            {{--@include ('pages.add_note_link', ['user' => Auth::user(), 'type'=>'families', 'id' => $family->id, 'name'=>$family->caption])<br/>--}}

            @if( $notes )
                @include ('partials._notes', ['notes' => $notes])
            @endif

            @include ('partials._stories', ['subject' => $family])



            @if (count($images))
            Images:
                @foreach($images as $image)
                    @include ('partials._image_link', ['image' => $image,  'class' => "img-rounded"])
                @endforeach
            @endif

        </div>

        <br/>
        {{--@FIXME: only show this note if one of the parents is showing an asterisk--}}
        <div style="float: left;width: 100%;">
            <br/>
        *Asterisk indicates the direct ancestors up from the four grandparents
        </div>

</div>


@stop

