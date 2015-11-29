{{--{{ $event->user->name }} updated a person {{ $event->created_at->diffForHumans() }}--}}

{{ $event->user->name }} updated
@include ('person.partials._person_link_simple', ['person' => $event->subject])

{{ $event->created_at->diffForHumans() }}
