<ul id="gallery">

<li>
    <a href="/image/{{ $image->id  }}">
    <img src="http://newribbon.com/family/images/{{ $image->little_name  }}" class="img-rounded">
        <p>
    {{ $image->caption  }}

@if ($image->year)
({{ $image->year}})
    @endif
    </a></p>
</li>
</ul>