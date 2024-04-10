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

                        <span class="badge border-primary border-1 text-primary">
                            {{ $this->selectedResearch->program->college->acroname }}
                            |
                            {{ $this->selectedResearch->program->acroname }}
                        </span>

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
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row g-3 px-3 pt-3 justify-content-center align-items-center">
                        <div class="col-8">
                            <input wire:model="search" type="text" class="form-control"
                                aria-label="Text input with dropdown button" placeholder="Search...">
                        </div>
                        <div class="col-2">
                            <select wire:model="filter" class="form-select">
                                <option value="all">All</option>
                                <option value="title">Title</option>
                                <option value="year">Year</option>
                                <option value="keyword">Keyword</option>
                                <option value="author">Author</option>
                                <option value="adviser">Adviser</option>
                                <option value="facultyInCharge">Faculty In Charge</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select wire:model="selectedCollege" class="form-select">
                                <option value="all">All College</option>
                                @foreach ($colleges as $college)
                                    <option value="{{ $college->acroname }}">{{ $college->acroname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row px-3 pb-3 pt-2 justify-content-center align-items-center">
                        <div class="col-12">
                            <small>
                                @isset($researches)
                                    Showing {{ $researches->firstItem() }} to {{ $researches->lastItem() }} of
                                    {{ $researches->total() }} results
                                @else
                                    No result found.
                                @endisset ($researches)
                            </small>
                        </div>
                    </div>
                </div>

                @forelse ($researches as $research)
                    <div class="card p-5">

                        <div class="row" wire:click="selectResearch( {{ $research->id }} )" style="cursor:pointer;">
                            <p class="mb-1">
                                <span class="badge bg-secondary">
                                    {{ $research->program->college->acroname }}
                                </span>
                            </p>
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
                                                {{-- {{ $research->adviser->middle_name[0] . '. ' ?? ''}} --}}
                                                {{ $research->adviser->last_name }}
                                            </span>
                                        </p>
                                    </div>
                                @endif
                               {{--  <div class="row">
                                    <h6 class="card-subtitle text-muted">Faculty In Charge</h6>
                                    <p class="mb-0">
                                        @if ($research->facultyInCharge)
                                            <span>
                                                <i class="ri-book-fill"></i>
                                                {{ $research->facultyInCharge->first_name }}
                                                {{ $research->facultyInCharge->middle_name[0] . '. ' ?? '' }}
                                                {{ $research->facultyInCharge->last_name }}
                                            </span>
                                        @endif
                                    </p>
                                </div> --}}
                            </div>
                        </div>

                        <hr>

                        <p class="mb-0">
                            @if ($research->keywords)
                                @foreach ($research->keywords as $keyword)
                                    <span class="badge text-bg-primary">
                                        {{ $keyword }}
                                    </span>
                                @endforeach
                            @endif
                        </p>
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

            <div class="col-lg-auto">
                <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">10 most used keyword</h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Keyword</th>
                                    <th scope="col" class="text-center">Usage Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topKeywords as $keyword)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center fs- fw-bold h6">
                                            <span class="badge bg-primary">{{ $keyword->keyword }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{ $keyword->count > 1 ? $keyword->count . ' ' . str()->plural('time') : $keyword->count . ' ' . 'time' }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    @endif

</div>
