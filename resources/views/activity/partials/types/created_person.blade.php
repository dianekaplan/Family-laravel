<a href="/people/{{$event->user->person_id}}">{{ $event->user->name }}</a>
created person:
@include ('person.partials._person_link_simple', ['person' => $event->subject])

{{ $event->created_at->diffForHumans() }}
