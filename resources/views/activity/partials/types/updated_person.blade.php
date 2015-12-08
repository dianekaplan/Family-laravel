{{--{{ $event->user->name }} updated a person {{ $event->created_at->diffForHumans() }}--}}

<a href="/people/{{$event->user->person_id}}">{{ $event->user->name }}</a>
updated
@include ('person.partials._person_link_simple', ['person' => $event->subject])

{{ $event->created_at->diffForHumans() }}
