<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LaporPak | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
  <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetsuser/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assetsuser/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
@include('layouts.navbar.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('layouts.section.hero')
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    @include('layouts.section.service')
    <!-- End Featured Services Section -->

    <!-- ======= Counts Section ======= -->
    @include('layouts.section.total')
    <!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->

    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.section.footer')
  <!-- End Footer -->

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
