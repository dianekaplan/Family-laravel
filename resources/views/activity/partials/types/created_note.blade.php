
<a href="/people/{{$event->user->person_id}}">{{ $event->user->name }}</a>
added a

{{--added this to specify person note or family note, but not worth wrapping to a second line )--}}
{{--@if ($event->subject->type =='1' )--}}
    {{--person--}}
{{--@else--}}
    {{--family--}}
{{--@endif--}}

note {{ $event->created_at->diffForHumans() }}:


@if ($event->subject->type =='1' )
    <a href="/people/{{$event->subject->ref_id}} ">here</a>
@else
    <a href="/families/{{$event->subject->ref_id}} ">here</a>
@endif
