  <!-- ======= Sidebar ======= -->
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
              <a class="nav-link collapsed" href="{{ route('research.search.index') }}">
                  <i class="bi bi-search"></i>
                  <span>Search Capstone | Thesis</span>
              </a>
          </li>

          <li class="nav-heading">Manage</li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-research.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-research.index') }}">
                  <i class="bi bi-book"></i>
                  <span>Capstone | Thesis</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-college.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-college.index') }}">
                  <i class="bi bi-building"></i>
                  <span>College</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-program.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-program.index') }}">
                  <i class="bi bi-building"></i>
                  <span>Program</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link  {{ Request::routeIs('admin.manage-dean.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-dean.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Dean</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-clerk.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-clerk.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Clerk</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-faculty.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-faculty.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Faculty</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('admin.manage-student.*') ? '' : 'collapsed' }}"
                  href="{{ route('admin.manage-student.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Student</span>
              </a>
          </li>



      </ul>

  </aside><!-- End Sidebar-->
