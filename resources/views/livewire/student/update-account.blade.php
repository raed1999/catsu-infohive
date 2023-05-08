<div wire:ignore.self class="row">
    <div class="col">
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="@if (Auth::user()->image_path != null) @if (Auth::user())
                            {{ asset(Auth::user()->image_path) }} @endif
@else
{{ asset('assets/img/profile-img.jpg') }} @endif"
                                alt="Profile" class="rounded-circle">
                            <h2>{{ Auth::user()->first_name . ' ' . Auth::user()->middle_name[0] . '. ' . Auth::user()->last_name }}
                            </h2>
                       {{--      {{ dd(Auth::user()->userType->name) }} --}}
                            <h3>{{ Str::title(Auth::user()->userType->name ) . ', ' . Auth::user()->college->acroname }}</h3>
                            {{--  <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul wire:ignore class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>


                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Reset Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div wire:ignore.self class="tab-pane fade show active profile-overview"
                                    id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ Auth::user()->first_name . ' ' . Auth::user()->middle_name . ' ' . Auth::user()->last_name }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">College</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->college->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Program</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->program->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>


                                <div wire:ignore.self class="tab-pane fade profile-edit pt-3 " id="profile-edit">
                                    <!-- Profile Edit Form -->

                                    <form action="" method="POST" wire:submit.prevent="updateAvatar"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="image" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">

                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}">
                                                @endif

                                                <div class="custom-file pt-1">
                                                    <input type="file" name="image_path"
                                                        class="custom-file-input d-none" wire:model="image"
                                                        id="image" accept=".jpg,.jpeg,.png">
                                                    <label
                                                        class="custom-file-label btn btn-sm btn-primary text-light fw-normal me-2"
                                                        for="image">
                                                        Choose image
                                                    </label>
                                                    <button type="submit" class="btn btn-primary btn-sm fw-normal"
                                                        title="Save profile image">Save
                                                        Image</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <form wire:ignore.self action="" wire:submit.prevent="updateAccount"
                                        method="post">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="bi bi-check-circle me-1"></i>
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <div class="row mb-3">
                                            <label for="first_name" class="col-md-4 col-lg-3 col-form-label">
                                                First Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="first_name" type="text" class="form-control"
                                                    id="first_name" wire:model="student.first_name">
                                                @error('student.first_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--   {{ dd($student->first_name) }} --}}
                                        <div class="row mb-3">
                                            <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">
                                                Middle Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="middle_name" type="text" class="form-control"
                                                    wire:model="student.middle_name" id="middle_name">
                                                @error('student.middle_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="last_name" class="col-md-4 col-lg-3 col-form-label">
                                                Last Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="last_name" class="form-control"
                                                    wire:model="student.last_name" id="last_name">
                                                @error('student.last_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>


                                <div wire:ignore.self class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form wire:submit.prevent="updatePassword">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show"
                                                role="alert">
                                                <i class="bi bi-check-circle me-1"></i>
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <div class="row mb-3">
                                            <label for="current_password"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" wire:model="current_password"
                                                    type="password" class="form-control" id="currentPassword">
                                                @error('current_password')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" wire:model="password" type="password"
                                                    class="form-control" id="password">
                                                @error('password')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password_confirmation"
                                                class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" wire:model="password_confirmation"
                                                    type="password" class="form-control" id="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change
                                                Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
