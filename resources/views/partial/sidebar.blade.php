<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('images/ilegs-logo.png') }}" alt="ILEGSOSA Logo" style="width: 200px;"
                class="mt-3">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('user.dashboard') }}">IL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown mt-4 {{ Route::is('user.dashboard') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard') }}" class="nav-link "><i class="fa fa-th-large"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown mt-4 {{ Route::is('user.announcement') ? 'active' : '' }}">
                <a href="{{ route('user.announcement') }}" class="nav-link "><i
                        class="far fa-file-alt"></i><span>Announcements</span></a>
            </li>
            <li class="nav-item dropdown mt-4 {{ Route::is('user.connect') ? 'active' : '' }}">
                <a href="{{ route('user.connect') }}" class="nav-link"><i class="far fa-user"></i>
                    <span>Connect
                        with mates</span></a>
            </li>
            <li
                class="nav-item dropdown mt-4 {{ Route::is('user.discussion.index') || Route::is('user.discussion.create') || Route::is('user.discussion.single') || Route::is('user.discussion.edit') ? 'active' : '' }}">
                <a href="{{ route('user.discussion.index') }}" class="nav-link"><i class="fas fa-tasks"></i>
                    <span>Discussion
                        Thread</span></a>
            </li>
            <li class="nav-item dropdown mt-4 {{ Route::is('user.due') ? 'active' : '' }}">
                <a href="{{ route('user.due') }}" class="nav-link"><i class="fas fa-wallet"></i> <span>Pay
                        Due</span></a>
            </li>
            <li class="nav-item dropdown mt-4 {{ Route::is('user.vote') ? 'active' : '' }}">
                <a href="{{ route('user.vote') }}" class="nav-link"><i class="far fa-chart-bar"></i><span>Cast
                        Vote</span></a>
            </li>
            <li
                class="nav-item dropdown  mt-4 {{ Route::is('user.profile') || Route::is('user.password') ? 'active' : '' }}">
                <a href="{{ route('user.profile') }}" class="nav-link"><i class="fa fa-cog"></i>
                    <span>Update Profile</span></a>
            </li>
            <li><a class="nav-link  mt-4" href="{{ route('auth.logout') }}"><i class="fa fa-sign-out-alt"></i>
                    <span>Log out</span></a>
            </li>
        </ul>

    </aside>
</div>
