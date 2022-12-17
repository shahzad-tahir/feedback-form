<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/admin/images/users/user-3.jpg') }}" alt="user-image"
                     class="rounded-circle">
                <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome Admin!</h6>
                </div>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                    <i class="fe-user-check"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button href="{{ route('logout') }}" type="submit" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ url('/') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('logo.png') }}" alt="" height="70">
                <!--  -->
            </span>
            <span class="logo-sm">
                            <!--  -->
                            <img src="{{ asset('favicon.ico') }}" alt="" height="70">
                        </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->
