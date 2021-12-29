<div class="header"> <!-- Header start -->
    <div class="header-left">
        <a href="{{ route('admin_dashboard') }}" class="logo">
            <img src="{{asset('light/assets/img/logo.png')}}" width="40" height="40" alt="">
            <span class="text-uppercase">Cseschool</span>
        </a>
    </div>
    <div class="page-title-box float-left">
        <h3 class="text-uppercase">Cseschool</h3>
    </div>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
{{--                <span class="user-img"><img class="rounded-circle" src="{{asset('storage/app\/'.\Auth::user()->avatar)}}" width="40" alt="{{ \Auth::user()->name }}">--}}
                    <span class="status online"></span></span>
{{--                <span>{{ Auth::user()->name }}</span>--}}
            </a>
            <div class="dropdown-menu">
{{--                <a class="dropdown-item" href="{{ route('admin_get_profile') }}">My Profile</a>--}}
{{--                <a class="dropdown-item" href="{{ route('admin_get_edit_profile') }}">Edit Profile</a>--}}
{{--                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>--}}
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right"> <!-- mobile menu -->
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
{{--            <a class="dropdown-item" href="{{ route('admin_get_profile') }}">My Profile</a>--}}
{{--            <a class="dropdown-item" href="{{ route('admin_get_edit_profile') }}">Edit Profile</a>--}}
{{--            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>--}}
        </div>
    </div>
</div>
