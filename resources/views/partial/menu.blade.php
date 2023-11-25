<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="{{url('dashboard')}}" class="nav-link @if(Request::segment(1)== 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

        </li>
        <li class="nav-item
            @if( Request::segment(1) == 'list') menu-open @endif
            @if( Request::segment(1) == 'jamb-list') menu-open @endif
            @if( Request::segment(1) == 'student-report') menu-open @endif
            ">
            <a href="#" class="nav-link
            @if( Request::segment(1) == 'list') active @endif
            @if( Request::segment(1) == 'jamb-list') active @endif
            @if( Request::segment(1) == 'student-report') active @endif
                ">
                <i class="fas fa-address-book nav-icon"></i>
                <p>
                    Admission Applicants
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('list')}}" class="nav-link @if( Request::segment(1) == 'list') active @endif">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Applications List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('jamb-list')}}" class="nav-link @if( Request::segment(1) == 'jamb-list') active @endif">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>JAMB Updates</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student-report.index') }}" class="nav-link @if( Request::segment(1) == 'student-report') active @endif">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Student Report</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('job-list')}}" class="nav-link @if( Request::segment(1) == 'job-list') active @endif">
                <i class="far fa-address-card nav-icon"></i>
                <p>Application for Job</p>
            </a>
        </li>
    </ul>
</nav>
