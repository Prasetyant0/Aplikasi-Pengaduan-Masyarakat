<header id="header" class="sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo"><img src="{{ asset('assetsuser/img/logolp.png') }}" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar con-nav">
            <ul>
                <li><a class="nav-link {{ request()->routeIs('Pengaduanku') ? 'active' : '' }} nav-hover" href="{{ route('Pengaduanku') }}">Pengaduanku</a></li>
                <li><a class="nav-link {{ request()->routeIs('Profile') ? 'active' : '' }} nav-hover" href="{{ route('Profile') }}">Profile</a></li>
                <li><a href="{{ route('logout') }}" class="btn btn-info mx-3 text-black btn-login">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
