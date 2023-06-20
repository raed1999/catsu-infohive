<x-layout>

    <x-slot:title>
        CatSU InfoHive | Dashboard
    </x-slot:title>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Capstone | Thesis</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $researchCount }}</h6>
                                        <span
                                            class="text-success small pt-1 fw-bold">{{ $confirmedResearchCount }}</span>
                                        <span class="text-muted small pt-2 ps-1">confirmed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Student</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $studentCount }}</h6>
                                        <span
                                            class="text-success small pt-1 fw-bold">{{ $confirmedStudentCount }}</span>
                                        <span class="text-muted small pt-2 ps-1">confirmed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Faculty</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $allFacultyCount }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $deanCount }}</span>
                                        <span class="text-muted small pt-2 ps-1">Dean</span>
                                        |
                                        <span class="text-success small pt-1 fw-bold">{{ $facultyCount }}</span>
                                        <span class="text-muted small pt-2 ps-1">Faculty</span>
                                        |
                                        <span class="text-success small pt-1 fw-bold">{{ $clerkCount }}</span>
                                        <span class="text-muted small pt-2 ps-1">Clerk</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card college-card">
                            <div class="card-body">
                                <h5 class="card-title">College</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $collegeCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card program-card">
                            <div class="card-body">
                                <h5 class="card-title">Program</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $programCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
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
                                        </td clas>
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
    </section>

</x-layout>
