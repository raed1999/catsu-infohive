    {{-- Faculty for Dean --}}
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-heading">University</li>

           {{--  <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('student.dashboard.*') ? '' : 'collapsed' }}" href="{{ route('student.dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('research.search.*') ? '' : 'collapsed' }}" href="{{ route('research.search.index') }}">
                    <i class="bi bi-search"></i>
                    <span>Search Capstone | Thesis</span>
                </a>
            </li>

           {{--  <li class="nav-heading">Manage</li> --}}

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('student.research.*') ? '' : 'collapsed' }}" href="{{ route('student.research.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Capstone | Thesis</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->
