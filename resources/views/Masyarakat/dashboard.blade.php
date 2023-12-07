<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Pengaduanku</title>

    {{-- Favicon --}}
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- Vendor CSS File --}}
    <link href="{{ asset('assetsuser/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- My Css --}}
    <link rel="stylesheet" href="{{ asset('assetsuser/css/pengaduan.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsuser/css/style.css') }}">
</head>

<body>

    {{-- Navbar --}}
    @include('Masyarakat.navbar.navbar')
    {{-- End Navbar --}}
    @include('Masyarakat.content.pengaduan-view')

    <main id="main">


    </main>

    {{-- Footer --}}
    @include('layouts.section.footer')
    {{-- End Footer --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assetsuser/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assetsuser/js/main.js') }}"></script>
@include('sweetalert::alert')
</body>

</html>
