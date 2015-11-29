

@foreach ($activity as $event)
    <li class="list-group-item">
        @include ("activity.partials.types.{$event->name}")
    </li>
@endforeach


