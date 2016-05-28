
{{--If we've made it here, we have an array: family name, followed by children--}}
{{--The whole thing will be in its own list--}}
<ul>

{{--First element will be the family, show that link --}}
   <li> <a href="/families/{{ $chunk[0][1] }}">{{$chunk[0][0]}}</a></li>

{{--Then everything after will be either a person or an array--}}
<?php
$size = sizeof($chunk);

    for ($x = 1; $x < $size; $x++)
    {
    ?>

    {{--If array, show this partial--}}
    @if (is_array($chunk[$x][0]))

        @include ('pages.partials._show_outline_family_chunk', [ 'chunk' => $chunk[$x] ])
    @endif

    {{--If not array and it's a person, show person link--}}
        @if (!is_array($chunk[$x][0]) &&  ($chunk[$x][2] == 'person'))

            <li><a href="/people/{{$chunk[$x][1]}}">{{$chunk[$x][0]}}</a></li>
                {{--can't do this yet because we have an id, not a person object--}}
                {{--@include ('person.partials._person_link', ['person' => $result[1], 'show_flag'=>'N', 'show_book'=>'Y'])--}}
        @endif
<?php
    }
?>

</ul>