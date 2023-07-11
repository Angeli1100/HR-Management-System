<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Arkod</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <!-- Admin Dashboard -->
        @if (Auth::user()->role == 1 ) 
        <li class="nav-item">
          <a href="{{ route('register_employee') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Register New Employee
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/list_employee')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Employee List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/user_list')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              User List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/payroll_manager')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Payroll Status
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="leaveDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Leave
        </p>
    </a>
         <div class="dropdown-menu" aria-labelledby="leaveDropdown">
        <a class="dropdown-item" href="{{ URL::to('/leave_admin') }}">Leave Request Status</a>
        <a class="dropdown-item" href="{{ URL::to('/leave_setting') }}">Leave Setting</a>
      </div>
      </li>
        <li class="nav-item">
          <a href="{{URL::to('/health_status')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Attrition
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/attendance')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Daily Attendance
            </p>
          </a>
        </li>
        @endif


        <!-- Manager Dashboard -->
        @if (Auth::user()->role == 2 )
        <li class="nav-item">
          <a href="{{ route('register_employee') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Register New Employee
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/list_employee')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Employee Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/user_list')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              User List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/payroll_manager')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Add Payroll
            </p>
          </a>
        </li>
        <a class="nav-link dropdown-toggle" href="#" id="leaveDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Leave
        </p>
    </a>
         <div class="dropdown-menu" aria-labelledby="leaveDropdown">
        <a class="dropdown-item" href="{{ URL::to('/leave_admin') }}">Leave Request</a>
        <a class="dropdown-item" href="{{ URL::to('/leave_setting') }}">Leave Setting</a>
      </div>
      </li>
        <li class="nav-item">
          <a href="{{URL::to('/health_status')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Attrition
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/attendance')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Daily Attendance
            </p>
          </a>
        </li>
        @endif

        <!-- Employee Dashboard -->
        @if (Auth::user()->role == 3 )
        <li class="nav-item">
        <a href="{{URL::to('user_personalDetail/{id}')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Personal Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{URL::to('page_link/{link}')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Daily Attendance
            </p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{URL::to('/leave_user')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Leave
            </p>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-th"></i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
