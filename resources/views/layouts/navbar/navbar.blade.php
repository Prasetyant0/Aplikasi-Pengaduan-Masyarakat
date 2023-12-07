<header id="header" class="sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="#hero" class="logo"><img src="{{ asset('assetsuser/img/logolp.png') }}"></a>

        <nav id="navbar" class="navbar con-nav">
            <ul>
                <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} nav-hover" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} nav-hover" href="{{ route('about') }}">Tentang Kami</a></li>
                {{-- <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} nav-hover" href="{{ route('contact') }}">Kontak Kami</a></li> --}}
                <li><a href="/login" class="nav-link btn btn-info mx-3 text-black btn-login2">Login</a></li>
                {{-- <li><button class="btn btn-info d-flex flex-shrink-0 mx-3">Login</button></li> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
