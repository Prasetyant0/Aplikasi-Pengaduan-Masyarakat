<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami | Pengaduanku</title>

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

<body style="background-color: #f4f4f4;">

    {{-- Navbar --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar --}}

    <header class="page-header text-center py-5">
        <div class="container">
            <h1>Tentang Kami</h1>
            <nav aria-label="Breadcrumb" class="lead">
                <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Tentang</li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="img-fluid py-3 text-center">
                    <img src="{{ asset('assetsuser/img/aboutus1.jpg') }}" alt="" style="max-height: 540px;">
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <p class="text-dark">Selamat datang di Aplikasi Pengaduan Masyarakat Dusun Margasari!</p>
                <p class="text-dark">Kami adalah jembatan yang menghubungkan harapan dan solusi, memupuk kebersamaan
                    dalam membangun komunitas yang lebih baik. Dengan dedikasi dan inovasi sebagai panduan kami, kami
                    telah menciptakan wadah yang aman dan efisien bagi Anda untuk berbicara, mendengarkan, dan berbagi.
                </p>
                <p class="text-dark">Di tengah gemuruh teknologi, kami memandang ke depan dengan tekad untuk
                    memberdayakan masyarakat Dusun Margasari dalam memperjuangkan perubahan positif. Aplikasi kami
                    memungkinkan Anda untuk dengan mudah melaporkan masalah yang Anda temui, berbagi ide-ide brilian,
                    dan memastikan suara Anda didengar oleh pihak yang berwenang.</p>
                <p class="text-dark">Kami adalah tim berdedikasi yang percaya bahwa setiap laporan adalah langkah menuju
                    solusi. Dengan teknologi canggih, data yang akurat, dan semangat kolaboratif, kami berkomitmen untuk
                    mengubah setiap tantangan menjadi peluang. Kami tidak hanya membangun aplikasi, tetapi juga sebuah
                    komunitas di mana solidaritas dan kerjasama mewarnai setiap langkah perjalanan kita.</p>
                <p class="text-dark">Bersama-sama, mari kita menciptakan masa depan yang lebih baik, di mana setiap
                    suara dihargai dan masyarakat Dusun Margasari tumbuh bersama sebagai satu keluarga. Selamat
                    bergabung dengan kami dalam perjalanan ini menuju perubahan yang bermakna!</p>
                <p class="text-dark">Terima kasih atas dukungan Anda.</p>
            </div>
        </div>
    </section>

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
