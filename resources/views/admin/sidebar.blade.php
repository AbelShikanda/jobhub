<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Admin" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicants.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Applicants
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizations.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Organizations
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('job.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            Jobs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Administrators
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrators.index') }}" class="nav-link">
                                <i class="fas fa-user-shield"></i>
                                <p>Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="fas fa-lock"></i>
                                <p>permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="fas fa-user-tag"></i>
                                <p>roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">LEVEL</li>
                <li class="nav-item">
                <li class="nav-item">
                    <a href="{{ route('organizations.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('job_categories.index') }}" class="nav-link">
                                <i class="fas fa-briefcase"></i>
                                <p>Job categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organizations_categories.index') }}" class="nav-link">
                                <i class="far fa-building"></i>
                                <p>Organizations categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('progress.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            progress
                        </p>
                    </a>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a class="nav-link text-grey" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-user"></i>
                        {{ __('Logout') }}
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
