    {{-- Faculty for Dean --}}
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-heading">University</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('clerk.manage-research.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Capstone | Thesis</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('research.search.index') }}">
                    <i class="bi bi-search"></i>
                    <span>Search Capstone | Thesis</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('clerk.manage-student.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Student</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->
