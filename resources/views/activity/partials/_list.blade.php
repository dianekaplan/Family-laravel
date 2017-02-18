@foreach ($activity as $event)
    @unless (in_array( $event->subject_type,  $hide_types) )
        <li class="list-group-item">
            @ifexists ("activity.partials.types.{$event->name}")
                @include ("activity.partials.types.{$event->name}")
            @endifexists
        </li>
    @endunless
@endforeach
{!! $activity->render() !!}



