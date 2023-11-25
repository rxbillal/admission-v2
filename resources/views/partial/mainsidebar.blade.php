<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #003111 !important;">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link"  style="background-color: white;">
        <img src="{{asset('frontend/assets/images/flogo.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: 1; width: 50px;">
        <span class="brand-text font-weight-light" style="color: #1b4600 !important;">Khadija University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session('user_name')}}</a>
            </div>
        </div>

   {{--     <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>--}}

        <!-- Sidebar Menu -->
    @include('partial.menu')
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

