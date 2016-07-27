
@foreach ( $results as $result)
    @if (!is_array($result[0]))
        @if( $result[2] == 'person')
           <li> <a href="/people/{{$result[1]}}">{{$result[0]}}</a></li><br/>

            {{--can't do this yet because we have an id, not a person object--}}
            {{--@include ('person.partials._person_link', ['person' => $result[1], 'show_flag'=>'N', 'show_book'=>'Y'])--}}

            @endif
        @if( $result[2] == 'family')
            {{--<a href="/families/132">$family->caption</a>--}}
            <a href="/families/{{$result[1]}}">{{$result[0]}}</a><br/>
        @endif

        {{--{{$result[0]}} <br/>--}}
        {{--{{$result}}<br/>--}}
    @endif
    @if (is_array($result[0]))

        @include ('pages.partials._show_outline_family_chunk', ['chunk' => $result])
        {{--{{$result[0]}}<br/>--}}
    @endif
@endforeach

