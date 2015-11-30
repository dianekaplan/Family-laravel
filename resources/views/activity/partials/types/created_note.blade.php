

<a href="/people/{{$event->user->person_id}}">{{ $event->user->name }}</a>
added a note {{ $event->created_at->diffForHumans() }}:


@if ($event->subject->type =='1' )
    <a href="/people/{{$event->subject->ref_id}} ">here</a>
@else
    <a href="/families/{{$event->subject->ref_id}} ">here</a>
@endif

 {{--{{$event->subject->body}}--}}