<x-layout>

    <x-slot:title>
        CatSU InfoHive | Register
    </x-slot:title>

    <main>
        <div class="container-fluid  mt-5">
            <section class="section register  d-flex flex-column align-items-center justify-content-center">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>


                                    <div class="">

                                        {{--     @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p class="text-danger fw-bold pb-0"> {{ $error }}</p>
                                            @endforeach
                                        @endif --}}

                                        @if (session('success'))
                                            <p class="text-success fw-bold pb-0"> {{ session('success') }}</p>
                                        @endif

                                    </div>

                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('auth.login-process') }}" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" value="{{ old('username') }}" name="username"
                                                class="form-control" id="username" required>
                                            @error('username')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-12">
                                            <label for="usertype" class="form-label">User type</label>
                                            <select class="form-select" name="usertype" id="usertype"
                                                aria-label="Default select example">
                                                <option value="" disabled selected></option>
                                                <option @if (old('usertype') == 4) selected @endif
                                                    value="4">Faculty</option>
                                                <option @if (old('usertype') == 5) selected @endif
                                                    value="5">Student</option>
                                            </select>
                                            @error('usertype')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{--   <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <label class="form-check-label" for=""></label>
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="{{ route('auth.register') }}">Create an account</a></p>
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
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


</x-layout>
