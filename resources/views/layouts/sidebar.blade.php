<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-user-md"></i><span>Doctor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('department.index') }}">
              <i class="bi bi-circle"></i><span>Manage Department</span>
            </a>
          </li>
          <li>
            <a href="{{ route('designation.index') }}">
              <i class="bi bi-circle"></i><span>Manage Designation</span>
            </a>
          </li>
          <li>
            <a href="{{ route('doctor.create') }}">
              <i class="bi bi-circle"></i><span>Add Doctor</span>
            </a>
          </li>
          <li>
            <a href="{{ route('doctor.index') }}">
              <i class="bi bi-circle"></i><span>List Doctor</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

       <!-- End Tables Nav -->

      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-wheelchair"></i><span>Patients Table</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('patient.index') }}">
                    <i class="bi bi-circle"></i><span>Patients List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patientAdmit.index') }}">
                    <i class="bi bi-circle"></i><span>Admit Patient</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
            <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#shedule-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-calendar"></i><span>Schedule</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="shedule-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a href="{{ route('shift.index') }}">
                    <i class="bi bi-circle"></i><span>Manage Shift</span>
                </a>
                </li>
                <li>
                <a href="{{ route('schedule.index') }}">
                    <i class="bi bi-circle"></i><span>Manage Schedule</span>
                </a>
                </li>
            </ul>
            </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-pencil-square"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('appoint.index') }}">
                <i class="bi bi-circle"></i><span>Appointment List</span>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#account-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-money-bill"></i><span>Account Manager</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="account-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('invoiceTest.index') }}">
                <i class="bi bi-circle"></i><span>Invoice List</span>
                </a>
            </li>
            </ul>
        </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-users"></i><span>Human Resources</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            {{-- <a href="{{ route('employee.index') }}">
              <i class="bi bi-circle"></i><span>Employee List</span>
            </a> --}}
            <a href="{{route('employee.show',6)}}"><i class="fa fa-list"></i><span> Accountant List </span></a>
          </li>
          <li>
            <a href="{{route('employee.show',5)}}"><i class="fa fa-list"></i><span> Laboratorist List </span></a>
          </li>
          <li>
            <a href="{{route('employee.show',3)}}"><i class="fa fa-list"></i><span> Nurse List </span></a>
          </li>
          <li>
            <a href="{{route('employee.show',4)}}"><i class="fa fa-list"></i> <span>Reciptionist List</span> </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      {{-- room --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#room-nav" data-bs-toggle="collapse" href="#">
            <i class="fa fa-bed"></i><span>Room Manager</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="room-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('roomCategory.index') }}">
              <i class="bi bi-circle"></i><span>Room Category</span>
            </a>
          </li>
          <li>
            <a href="{{ route('roomList.index') }}">
              <i class="bi bi-circle"></i><span>Manage Room</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Hospital Activities</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('birth.index') }}">
              <i class="bi bi-circle"></i><span>Birth Report</span>
            </a>
          </li>
          <li>
            <a href="{{ route('death.index') }}">
              <i class="bi bi-circle"></i><span>Death Report</span>
            </a>
          </li>
          <li>
            <a href="{{ route('operation.index') }}">
              <i class="bi bi-circle"></i><span>Operation Schedule</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testCategory.index') }}">
              <i class="bi bi-circle"></i><span>Hospital Test Catagory</span>
            </a>
          </li>
          <li>
            <a href="{{ route('test.index') }}">
              <i class="bi bi-circle"></i><span>Hospital Test</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside>
