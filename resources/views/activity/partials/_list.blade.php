{{--@@TODO: come back and handle this better--}}

@if ($hide == 'notes')
    @foreach ($activity as $event)
        @unless ($event->subject_type == 'App\Note')
            <li class="list-group-item">
                @include ("activity.partials.types.{$event->name}")
            </li>
        @endunless
    @endforeach

@else
    @foreach ($activity as $event)
        <li class="list-group-item">
                    @include ("activity.partials.types.{$event->name}")
        </li>
    @endforeach
@endif




