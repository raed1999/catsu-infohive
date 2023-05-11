<div>
    <div class="card">
        <div class="row g-3 p-3 justify-content-center align-items-center">
            <div class="col-12">
                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                    aria-label="Text input with dropdown button" placeholder="Search...">
            </div>
            <div class="col-12">
                <small>
                    @if ($researches->firstItem())
                        Showing {{ $researches->firstItem() }} to {{ $researches->lastItem() }} of
                        {{ $researches->total() }} results
                    @else
                        No result found.
                    @endif

                </small>
            </div>
        </div>
    </div>

    @forelse ($researches as $research)
        <div class="card p-5" wire:loading.class="opacity-50">

            <div class="row">
                <h4 class="">
                    <a href="" class="mb-1 nav-link fw-bolder ">
                        {{ $research->title }}, {{ $research->year }}
                    </a>
                </h4>
            </div>
            <div class="row">
                <p class="text-italic mb-0">
                    "{{ Str::limit($research->abstract, 300) }}"
                </p>
            </div>

            <hr>

            <div class="row g-3">
                @if ($research->authors->isNotEmpty())
                    <div class="col-12 col-sm-12 col-md-6">
                        <h6 class="card-subtitle text-muted">Authors</h6>
                        @foreach ($research->authors as $author)
                            <p class="mb-0">
                                <span class="">
                                    <i class="ri-user-5-fill"></i>
                                    {{ $author->first_name }}
                                    {{ $author->middle_name ?? '' }}
                                    {{ $author->last_name }}
                                </span>
                            </p>
                        @endforeach
                    </div>
                @endif
                <div class="col-12 col-sm-12 col-md-6">
                    @if ($research->adviser)
                        <div class="row mb-3">
                            <h6 class="card-subtitle text-muted">Adviser</h6>
                            <p class="mb-0">
                                <span>
                                    <i class="ri-book-fill"></i>
                                    {{ $research->adviser->first_name }}
                                    {{ $research->adviser->middle_name[0] . '. ' }}
                                    {{ $research->adviser->last_name }}
                                </span>
                            </p>
                        </div>
                    @endif
                    <div class="row">
                        <h6 class="card-subtitle text-muted">Faculty In Charge</h6>
                        <p class="mb-0">
                            @if ($research->facultyInCharge)
                                <span>
                                    <i class="ri-book-fill"></i>
                                    {{ $research->facultyInCharge->first_name }}
                                    {{ $research->facultyInCharge->middle_name ?? '' }}
                                    {{ $research->facultyInCharge->last_name }}
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <hr>

            {{--       <div class="row mb-3">
                        <h6 class="card-subtitle text-muted">Keywords</h6> --}}
            <p class="mb-0">
                @if ($research->keywords)
                    @foreach ($research->keywords as $keyword)
                        <span class="badge text-bg-primary">
                            {{--   <i class="ri-user-smile-line"></i> --}}
                            {{ $keyword }}
                        </span>
                    @endforeach
                @endif
            </p>
            {{--   </div> --}}
        </div>
    @empty
        <div class="card" wire:loading.class="opacity-75">
            <div class="row p-5 justify-content-center text-center align-items-center">
                <div class="col-12">
                    <p class="mb-0">No result found</p>
                </div>
            </div>
        </div>
    @endforelse

    {{ $researches->links() }}

</div>
