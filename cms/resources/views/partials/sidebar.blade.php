<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item @if (Request::segment(1) == 'dashboard') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('/dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Incoming Cases
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->can('case-create'))
                        <li class="nav-item">
                            
                            <a class="nav-link" href="{{ asset('/add-case') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Case Register</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">

                            <a class="nav-link" href="{{ asset('/view-case-list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Case List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('/approve-case') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Take Cognigence</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Courtwise Register
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($courtCategory as $ccat)
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('register/' . $ccat->id) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $ccat->courtCat }}</p>
                                </a>
                            </li>
                        @endforeach

                        {{-- $caseType --}}
                        {{-- @foreach ($caseType as $ct)
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('case-type/' . $ct->case_type) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $ct->full_form }}</p>
                                </a>
                            </li>
                        @endforeach --}}

                    </ul>
                </li>
                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Typewise Register
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        {{-- $caseType --}}
                        @foreach ($caseType as $ct)
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('case-type/' . $ct->case_type) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $ct->full_form }}</p>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Daily Update
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        {{-- $caseType --}}
                       
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('case-today/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Case Today</p>
                                </a>
                            </li>
                        

                    </ul>
                </li>
                @if(Auth::user()->can('view-setting'))
                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        {{-- $caseType --}}
                       
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('setting/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Properties</p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('laws/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laws</p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('registration/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registration</p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('user-list/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User-list</p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('role/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Role</p>
                                </a>
                            </li>
                        

                    </ul>
                </li>
                @endif

                <li class="nav-item  @if (Request::segment(1) == 'add-case' || Request::segment(1) == 'view-case-list') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Investigation
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        {{-- $caseType --}}
                       
                            <li class="nav-item">

                                <a class="nav-link" href="{{ asset('investigation/') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sent for investigation</p>
                                </a>
                            </li>

                            
                        

                    </ul>
                </li>
                

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
