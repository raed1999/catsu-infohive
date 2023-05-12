<div>
    @if ($selectedResearch)

        <div class="card">
            {{--  <div class="card-header">Header</div> --}}
            <div class="card-body p-5">
                <div class="row  mb-3">
                    <div class="col text-end">
                        <button class="btn btn-sm btn-primary" wire:click="removeSelectedResearch()">Back to list</button>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col mb-3">
                        <h4 class="card-title py-2 mb-0 fs-2">
                            {{ $selectedResearch->title . ', ' . $selectedResearch->year }}</h4>
                    </div>
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Authors</h4>
                    <p class="">
                        @foreach ($selectedResearch->authors as $author)
                            <span class="me-3 fw-bold">
                                <i class="ri-user-5-fill"></i>
                                {{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name }}
                            </span>
                        @endforeach
                    </p>
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Abstract</h4>
                    <p class="lh-base text-justify fst-italic"
                        style="text-align: justify;
                    text-justify: inter-word;">
                        {{ $selectedResearch->abstract }}
                    </p>
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Keywords</h4>
                    @foreach ($selectedResearch->keywords as $keyword)
                        <span class="badge text-bg-primary">{{ $keyword }}</span>
                    @endforeach
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Adviser</h4>

                    <span>
                        <i class="ri-book-fill"></i>
                        {{ $selectedResearch->adviser->first_name . ' ' . $selectedResearch->adviser->middle_name . ' ' . $selectedResearch->adviser->last_name }}
                    </span>
                </div>
                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Faculty In Charge</h4>

                    <span>
                        <i class="ri-book-fill"></i>
                        {{ $selectedResearch->facultyInCharge->first_name . ' ' . $selectedResearch->facultyInCharge->middle_name . ' ' . $selectedResearch->facultyInCharge->last_name }}
                    </span>
                </div>
            </div>
            {{--  <div class="card-footer"> </div> --}}
        </div>
    @else()
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

        {{--       @dd($researches) --}}

        @forelse ($researches as $research)
            <div class="card p-5" wire:loading.class="opacity-50" wire:click="selectResearch( {{ $research->id }} )">

                <div class="row">
                    <h4 class="">
                        <p href="#" class="mb-1 nav-link fw-bolder ">
                            {{ $research->title }}, {{ $research->year }}
                        </p>
                    </h4>
                </div>
                <div class="row">
                    <p class="text-justify mb-0 fst-italic"
                        style="text-align: justify;
                    text-justify: inter-word;">
                        "{{ Str::limit($research->abstract, 100) }}"
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

    @endif

</div>
