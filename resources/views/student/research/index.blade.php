<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Capstone / Thesis
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3> Manage Capstone / Thesis</h3>
        </div>
        <div class="col-auto">
        </div>
    </div>
    {{--     {{ dd(Auth::user()) }} --}}
    @if (Auth::user()->research_id == null)
        <div class="row mb-2 justify-content-between">
            <div class="col">
                <div class="alert alert-light border-light fade show" role="alert">
                    <h4 class="alert-heading">No Capstone or Thesis </h4>
                    <p>Upload your Capstone / Thesis and share them in your college.</p>
                    <hr>
                    <a href="{{ route('student.research.create') }}" class="btn btn-primary">Add Capstone / Thesis</a>
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->research_id)

        <div class="card">
            {{--  <div class="card-header">Header</div> --}}
            <div class="card-body p-5">

                @if ($research->confirmed_by_id)
                    <span class="badge bg-success text-white" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Research that are confirmed are not editable'>Confirmed</span>
                @else
                    <span class="badge bg-warning text-white" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Research that are confirmed are not editable'>Not confirmed</span>
                @endif

                <div class="row align-items-center">
                    <div class="col mb-3">
                        <h4 class="card-title py-2 mb-0 fs-2">
                            {{ $research->title . ', ' . $research->year }}
                        </h4>
                    </div>
                    @if (!$research->confirmed_by_id)
                        <div class="col-auto mb-3">
                            <a href="{{ route('student.research.edit', $research->id) }}"
                                class="btn btn-sm btn-primary">Edit
                                Capstone / Thesis</a>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Authors</h4>
                    <p class="">
                        @foreach ($research->authors as $author)
                            <span class="me-3 fw-bold"> <i class="bx bxs-user"></i>
                                {{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name }}</span>
                        @endforeach
                    </p>
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Abstract</h4>
                    <p class="lh-base text-justify"> {{ $research->abstract }}</p>
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Keywords</h4>
                    @foreach ($research->keywords as $keyword)
                        <span class="badge text-bg-primary">{{ $keyword }}</span>
                    @endforeach
                </div>

                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Adviser</h4>
                    <p>{{ $research->adviser->first_name . ' ' . $research->adviser->middle_name . ' ' . $research->adviser->last_name }}
                    </p>
                </div>
                <div class="mb-3">
                    <h4 class="card-title py-2 mb-0">Faculty In Charge</h4>
                    <p>{{ $research->facultyInCharge->first_name . ' ' . $research->facultyInCharge->middle_name . ' ' . $research->facultyInCharge->last_name }}
                    </p>
                </div>
            </div>
            {{--  <div class="card-footer"> </div> --}}
        </div>
    @endif

</x-layout>
