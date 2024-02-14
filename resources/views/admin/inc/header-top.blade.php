<div class="header">

    <div class="header-left active">
        <a href="{{ route('dashboard.view') }}" class="logo">
            <img src="{{ asset('admin') }}/assets/img/logo.png" alt="">
        </a>
        <a href="index.html" class="logo-small">
            <img src="{{ asset('admin') }}/assets/img/logo-small.png" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('admin') }}/assets/img/profiles/logo2.png"
                        alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <div class="profilesets">
                            <h6>
                                @if (Auth::check())
                                    {{ Auth::user()->email }}
                                @endif
                            </h6>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('user.profile') }}"> <i class="me-2" data-feather="user"></i>
                        My Profile</a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('user.logout') }}"><img
                            src="{{ asset('admin') }}/assets/img/icons/log-out.svg" class="me-2"
                            alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="generalsettings.html">Settings</a>
            <a class="dropdown-item" href="signin.html">Logout</a>
        </div>
    </div>

</div>
