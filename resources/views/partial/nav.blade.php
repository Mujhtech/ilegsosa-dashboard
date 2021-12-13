<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->full_name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
                    <i class="fa fa-cog"></i> Update Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('auth.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
