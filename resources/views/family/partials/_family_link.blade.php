
{{--<a class=".g10" href="{{ action('PeopleController@show', [$family->id]) }}" >{{ $family->caption }} </a>--}}

<a href="{{ action('FamilyController@show', [$family->id]) }}" class=".g{{$generation}}">{{ $family->caption }} </a>
{{--class="g<%=branchRS.Fields("branchseq").Value %>--}}