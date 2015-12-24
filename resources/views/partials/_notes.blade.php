@foreach($notes as $note)

    {{--I was considering including the person_link partial, but we have a person->id and not a person--}}
    {{--@include ('person.partials._person_link', ['person' =>  $note->author])--}}
    {{--Also the partial has stuff I don't need in this case, like default image if no face (anyone making a note has face)--}}

    @if($note->author)
        <div class="media">
            <div class= "media-left">
                {{--originally used class "media-object", but switched to rounded for corners, and the wrapping still works--}}
                <img class="img-rounded"  src="/faces/{{  $note->face  }}"/>
            </div>
            <div class = "media-body">

                {{--Only show the name if it's a note about someone else, not for self-notes--}}
                @if ($note->author_name)
                <a href="{{ action('PeopleController@show', [$note->author]) }}">{{$note->author_name}}</a>:
                    @endif
                @else
                    <br/>
                @endif

                {!! $note->body !!}

            </div>
        </div>
        @endforeach