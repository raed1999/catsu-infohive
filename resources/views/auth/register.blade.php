<x-layout>

    <x-slot:title>
        CatSU InfoHive | Register
    </x-slot:title>

        <div class="container-fluid mt-5">

            <section class="section register d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your details to create account</p>
                                    </div>

                                    {{--    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p class="text-danger fw-bold pb-0"> {{ $error }}</p>
                                        @endforeach
                                    @endif --}}


                                    <form action="{{ route('student.manage-account.store') }}"
                                        class="row g-3 needs-validation" method="POST" novalidate>
                                        @csrf
                                        <div class="col-4">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" name="firstName" value="{{ old('firstName') }}"
                                                class="form-control" id="firstName" required>
                                            @error('firstName')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="yourName" class="form-label">Middle Name</label>
                                            <input type="text" name="middleName" value="{{ old('middleName') }}"
                                                class="form-control" id="middleName" required>
                                            @error('middleName')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="yourName" class="form-label">Last Name</label>
                                            <input type="text" name="lastName" value="{{ old('lastName') }}"
                                                class="form-control" id="lastName" required>
                                            @error('lastName')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- Livewire Script of Form here --}}
                                        @livewire('forms.college-programs', [
                                            'oldCollege' => old('college'),
                                            'oldProgram' => old('program'),
                                        ])


                                        <div class="col-8">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" id="email" required>
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Student ID No.</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="text" name="studentIdNo"
                                                    value="{{ old('studentIdNo') }}" class="form-control"
                                                    id="studentIdNo" required>
                                                @error('studentIdNo')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control" id="password" required>
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" class="form-control"
                                                id="password" required>
                                            @error('password_confirmation')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    id="terms" required>
                                                <label class="form-check-label" for="terms">I agree and accept
                                                    the
                                                    <a href="#">terms and conditions</a></label>
                                                @error('terms')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create
                                                Account</button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('auth.login') }}">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Copyright @ <strong><span>{{ now()->year }}</span></strong> <br>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</x-layout>
