<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Clerks
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

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-edit">Edit Profile</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-settings">Settings</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Reset Password</button>
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
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->email }}</div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                        <!-- Profile Edit Form -->
                                        <form action="" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <label for="profileImage"
                                                    class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-9">

                                                    <img id="preview" src="{{ asset('assets/img/profile-img.jpg') }}"
                                                        alt="Profile">
                                                    <div class="pt-2">
                                                        <button href="#" class="btn btn-primary btn-sm"
                                                            title="Save profile image"><i
                                                                class="bi bi-save"></i></button>
                                                        <input type="file" class="btn btn-success btn-sm"
                                                            id="image" onchange="previewImage();" accept="image/*"
                                                            name="image" title="Upload image"><i
                                                            class="bi bi-upload"></i></input>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input d-none"
                                                                id="customFile">
                                                            <label class="custom-file-label" for="customFile">
                                                                Choose image
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">


                                            </div>

                                            <div class="row mb-3">
                                                <label for="first_name" class="col-md-4 col-lg-3 col-form-label">
                                                    First Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="first_name" type="text" class="form-control"
                                                        id="first_name" value="{{ $student->first_name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">
                                                    Middle Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="middle_name" type="text" class="form-control"
                                                        id="middle_name" value="{{ $student->middle_name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="last_name" class="col-md-4 col-lg-3 col-form-label">
                                                    Last Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="last_name" type="text" class="form-control"
                                                        id="last_name" value="{{ $student->last_name }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Address"
                                                    class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="address" type="text" class="form-control"
                                                        id="Address" value="A108 Adam Street, New York, NY 535022">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Phone"
                                                    class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="phone" type="text" class="form-control"
                                                        id="Phone" value="(436) 486-3538 x29071">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Email"
                                                    class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control"
                                                        id="Email" disabled value="{{ $student->email }}">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-settings">

                                        {{--      <!-- Settings Form -->
                                        <form>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                    Notifications</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="changesMade" checked>
                                                        <label class="form-check-label" for="changesMade">
                                                            Changes made to your account
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="newProducts" checked>
                                                        <label class="form-check-label" for="newProducts">
                                                            Information on new products and services
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="proOffers">
                                                        <label class="form-check-label" for="proOffers">
                                                            Marketing and promo offers
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="securityNotify" checked disabled>
                                                        <label class="form-check-label" for="securityNotify">
                                                            Security alerts
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form><!-- End settings Form --> --}}

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form>

                                            <div class="row mb-3">
                                                <label for="currentPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="password" type="password" class="form-control"
                                                        id="currentPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                    Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newpassword" type="password" class="form-control"
                                                        id="newPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="renewPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                                    Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="renewpassword" type="password" class="form-control"
                                                        id="renewPassword">
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


</x-layout>
