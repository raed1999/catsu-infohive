<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Faculty
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Faculty</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Faculty</li>
                        <li class="breadcrumb-item active">Faculty Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


                                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile"
                                    class="rounded-circle">
                                <h2>{{ $faculty->first_name . ' ' . $faculty->middle_name[0] . '. ' . $faculty->last_name }}
                                </h2>
                                <h3>{{ $userType . ', ' . $college }}</h3>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                        <h5 class="card-title">Profile Details</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{ $faculty->first_name . ' ' . $faculty->middle_name . ' ' . $faculty->last_name }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">College</div>
                                            <div class="col-lg-9 col-md-8">{{ $faculty->college->name }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Position</div>
                                            <div class="col-lg-9 col-md-8">Faculty</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $faculty->email }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Status</div>
                                            <div class="col-lg-9 col-md-8">
                                                @if ($faculty->deleted_at)
                                                    <span class="badge rounded-pill bg-danger">Disabled</span>
                                                @endif

                                                @if (!$faculty->deleted_at)
                                                    <span class="badge rounded-pill bg-primary">Enabled</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>


</x-layout>
