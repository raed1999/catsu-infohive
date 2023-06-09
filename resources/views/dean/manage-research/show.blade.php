<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Capstone | Thesis
    </x-slot:title>

    <div class="pagetitle">
        <h1>Manage Capstone | Thesis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item">Manage Capstone | Thesis</li>
                <li class="breadcrumb-item active">Capstone | Thesis Details</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body p-5">
            @if ($research->confirmed_by_id)
                <span class="badge rounded-pill bg-success text-uppercase p-2" data-bs-toggle='tooltip'
                    data-bs-placement='bottom'
                    data-bs-original-title='Confirmed by {{ $research->confirmedBy->first_name . ' ' . $research->confirmedBy->last_name }}'>Confirmed</span>
            @else
                <span class="badge rounded-pill bg-warning  text-uppercase p-2 text-dark">Not Confirmed</span>
                </a>
            @endif

            <div class="row align-items-center">
                <div class="col mb-3">
                    <h4 class="card-title py-2 mb-0 fs-2">
                        {{ $research->title . ', ' . $research->year }}
                    </h4>
                </div>
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

</x-layout>
