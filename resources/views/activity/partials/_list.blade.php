@foreach ($activity as $event)
    @unless (in_array( $event->subject_type,  $hide_types) )
        <li class="list-group-item">
                @include ("activity.partials.types.{$event->name}")
        </li>
    @endunless
@endforeach
{!! $activity->render() !!}



