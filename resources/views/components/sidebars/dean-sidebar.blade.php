    {{-- Sidebar for Dean --}}
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
        <a class="nav-link collapsed" href="#">
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

{{--       <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-building"></i>
          <span>College</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-building"></i>
          <span>Program</span>
        </a>
      </li>

      <li class="nav-heading">Users</li>

    {{--   <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Dean</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dean.manage-clerk.*') ? '' : 'collapsed' }}" href="{{ route('dean.manage-clerk.index') }}">
          <i class="bi bi-person"></i>
          <span>Clerk</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dean.manage-faculty.*') ? '' : 'collapsed' }}" href="{{  route('dean.manage-faculty.index') }}">
          <i class="bi bi-person"></i>
          <span>Faculty</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Student</span>
        </a>
      </li>



    </ul>

  </aside><!-- End Sidebar-->
