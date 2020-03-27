<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)" style="color: #000;">
                <i class="ti-menu ti-close"></i>
            </a>

            <!-- Logo -->
            <div class="navbar-brand" style="padding: 0 86px;">
                <a href="{{ route('dashboard') }}" class="logo">
                    <span class="logo-text">
                        <img src="{{ asset('admin_dashboard/img/logo.png') }}" class="light-logo" alt="homepage" width="70"/>
                    </span>
                </a>
                <!-- <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a> -->
            </div>
            <!-- End Logo -->

            <!-- Toggle which is visible on mobile only -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more text-dark"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <!-- <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li> -->
            </ul>
            <!-- Right side toggle and nav items -->
            <ul class="navbar-nav float-right">
                <!-- User profile and search -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(isset(\Auth::user()->image))
                            <img src="{{ asset('uploads/'.\Auth::user()->image) }}" alt="user" class="rounded-circle img-fluid profile_image" style="height: 36px !important; width: 36px;">
                        @else
                            <img src="{{ asset('admin_dashboard/img/default.png') }}" alt="user" class="rounded-circle img-fluid profile_image" width="40" height="40">
                        @endif
                        <span class="m-l-5 font-medium d-none d-sm-inline-block">
                            {{ ucwords(\Auth::user()->first_name.' '.\Auth::user()->last_name) }}
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary" style="background-color: #233F4E !important"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10" style="background-color: #233F4E!important;">
                            @if(isset(\Auth::user()->image))
                                <img src="{{ asset('uploads/'.\Auth::user()->image) }}" alt="user" class="rounded-circle" width="60" height="60">
                            @else
                                <img src="{{ asset('admin_dashboard/img/default.png') }}" alt="user" class="rounded-circle" width="60" height="60">
                            @endif
                            <div class="m-l-10">
                                <h4 class="mb-0">{{ ucwords(\Auth::user()->first_name.' '.\Auth::user()->last_name) }}</h4>
                                <p class=" mb-0">{{ \Auth::user()->email }}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="ti-user m-r-5 m-l-5"></i> My Profile
                        </a>
                        <!-- <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-email m-r-5 m-l-5"></i> Inbox
                        </a> -->
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>