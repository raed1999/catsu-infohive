<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'CatSU InfoHive' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.pn') }}g" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link
        href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sr-1.2.2/datatables.min.css"
        rel="stylesheet" />

    @vite(['resources/css/app.css'])

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @livewireStyles()


    <!-- Template Main CSS File -->




</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" style="height: 8vh">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/catsu.png') }}" alt="">
                <span class="d-none d-lg-block">CatSu InfoHive</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="@if (Auth::user()->image_path != null) @if (Auth::user())
                        {{ asset(Auth::user()->image_path) }} @endif
@else
{{ asset('assets/img/profile-img.jpg') }} @endif"
                            alt="Profile" class="rounded-circle">
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2">{{ 'Hi, ' . Auth::user()->first_name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h6>
                            <span>{{ Auth::user()->college->acroname }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ Auth::user()->usertype_id == 5 ? route('student.manage-account.show', Auth::id()) : '#' }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{--  <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    {{-- Sidebar --}}

    {{-- For Admin --}}
    @if (Auth::user()->usertype_id == 1)
        <x-sidebars.admin-sidebar />
    @endif

    {{-- For Dean --}}
    @if (Auth::user()->usertype_id == 2)
        <x-sidebars.dean-sidebar />
    @endif

    {{-- For clerk  --}}
    @if (Auth::user()->usertype_id == 3)
        <x-sidebars.clerk-sidebar />
    @endif

    {{-- For Faculty  --}}
    {{-- D A I   P A --}}

    {{-- For Student  --}}
    @if (Auth::user()->usertype_id == 5)
        <x-sidebars.student-sidebar />
    @endif


    {{-- End of Sidebar --}}

    <main id="main" class="main" style="height: auto">

        {{ $slot }}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{--  <footer id="footer" class="footer" style="height: 10vh">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ now()->year }}</span></strong>
        </div>
        <div class="credits">
            BMT | GGA | JGMB | REWP
        </div>
    </footer> --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->


    {{--    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    {{--    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{--  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.3/datatables.min.js"></script> --}}
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sr-1.2.2/datatables.min.js">
    </script>

    @livewireScripts()
    @vite(['resources/js/app.js']);

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')

    <script>
        $('#deans-table').on('draw.dt', function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        })
    </script>


</body>

</html>
