<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion print-none" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{ asset('assetsuser/img/thumbnail.svg') }}" width="35" alt="" class="bg-white rounded-circle">
                </div>
                <div class="sidebar-brand-text mx-3">Lapor Pak!!!</div>
                {{-- <img src="{{ asset('assetsuser/img/logolp.png') }}" class="sidebar-brand" alt=""> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->routeIs('admin-dashboard') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('admin-dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can('admin')
            <li class="nav-item {{ request()->routeIs('Data.Masyarakat') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('Data.Masyarakat') }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Data Masyarakat</span>
                </a>
            </li>
                <li class="nav-item {{ request()->routeIs('Data.Pegawai') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('Data.Pegawai') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>
            @endcan
            <li class="nav-item {{ request()->routeIs('Kategori.Pengaduan') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('Kategori.Pengaduan') }}">
                    <i class="fa-solid fa-list-ul"></i>
                    <span>Kategori Pengaduan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item {{ request()->routeIs('Laporan.Masuk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('Laporan.Masuk') }}">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Laporan Masuk</span></a>
            </li>
            @can('admin')

            <li class="nav-item {{ request()->routeIs('Generate.Page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('Generate.Page') }}">
                    <i class="fa-solid fa-print"></i>
                    <span>Generate Laporan</span></a>
                </li>
                @endcan
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
