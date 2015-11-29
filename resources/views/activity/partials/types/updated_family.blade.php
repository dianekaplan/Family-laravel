{{ $event->user->name }} updated
@include ('family.partials._family_link', ['family' => $event->subject, 'generation' => 'NA'])

{{ $event->created_at->diffForHumans() }}