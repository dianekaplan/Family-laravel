

{{ $event->user->name }} added a note {{ $event->created_at->diffForHumans() }}:


@if ($event->subject->type =='1' )
    (<a href="/people/{{$event->subject->ref_id}} ">view here</a>)
@else
    (<a href="/families/{{$event->subject->ref_id}} ">view here</a>)
@endif

 {{$event->subject->body}}