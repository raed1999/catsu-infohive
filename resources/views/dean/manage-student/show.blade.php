<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Students
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3>Profile</h3>
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
                                <h2>{{ $student->first_name . ' ' . $student->middle_name[0] . '. ' . $student->last_name }}
                                </h2>
                                <h3>{{ $userType . ', ' . $program }}</h3>
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
                                                {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">College</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->college->name }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Program</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->program->name }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Position</div>
                                            <div class="col-lg-9 col-md-8">Student</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->email }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Status</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{-- Soft Delete --}}
                                                @if ($student->deleted_at)
                                                    <span class="badge rounded-pill bg-danger">Disabled</span>
                                                @endif

                                                @if (!$student->deleted_at)
                                                    <span class="badge rounded-pill bg-primary">Enabled</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Verification</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{-- Verification --}}
                                                @if (!$student->email_verified_at)
                                                    <span class="badge rounded-pill bg-warning">Unverified</span>
                                                @endif

                                                @if ($student->email_verified_at)
                                                    <span class="badge rounded-pill bg-success">Verified</span>
                                                @endif
                                                </form>

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
