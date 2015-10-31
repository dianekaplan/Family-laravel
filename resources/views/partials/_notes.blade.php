@foreach($notes as $note)

    {{--I was considering including the person_link partial, but we have a person->id and not a person--}}
    {{--@include ('person.partials._person_link', ['person' =>  $note->author])--}}
    {{--Also the partial has stuff I don't need in this case, like default image if no face (anyone making a note has face)--}}
    {{--If I do leave it as is, need to add the img-rounded class in there somehow with the media-object class-
     I tried adding border-radius="6px" to that class, but it didn't take effect--}}

    @if($note->author)
        <div class="media">
            <div class= "media-left">
                <img class="media-object"  src="/faces/{{  $note->face  }}"/>
            </div>
            <div class = "media-body">

                {{--Only show the name if it's a note about someone else, not for self-notes--}}
                @if ($note->author_name)
                <a href="{{ action('PeopleController@show', [$note->author]) }}">{{$note->author_name}}</a>:
                    @endif

                    @endif
                {{$note->body}}
            </div>
        </div>
        @endforeach