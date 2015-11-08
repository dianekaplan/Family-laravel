<ul id="gallery">

<li>
    <a href="/image/{{ $image->id  }}">

        {{--They all show up when I do this: --}}
        <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "100" class="img-rounded">
        <p>
    {{ $image->caption  }}

@if ($image->year)
({{ $image->year}})
    @endif
    </a></p>
</li>
</ul>