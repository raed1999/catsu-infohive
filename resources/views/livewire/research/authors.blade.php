<span data-bs-toggle="tooltip" data-bs-placement="top"
    data-bs-title="
@foreach ($authors as $author)
{{ $author->first_name }}
{{ $author->middle_name[0] ?? '' }}.
{{ $author->last_name }} @endforeach
">
    @if (count($authors) > 1)
        {{ $authors->first()->last_name }} <span class="fst-italic">et al.</span>
    @else
        {{ $authors->first()->last_name ?? '' }}
    @endif

</span>
