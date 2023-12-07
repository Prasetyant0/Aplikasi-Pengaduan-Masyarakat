<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hubungi Kami | Pengaduanku</title>

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
    @include('layouts.navbar.navbar')
    {{-- End Navbar --}}

    <header class="page-header text-center py-5">
        <div class="container">
            <h1>Contact Us</h1>
            <nav aria-label="Breadcrumb" class="lead">
                <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- <section class="container">
        <div class="row d-flex">
            <div class="col-lg-6 py-3">
                <div class="img-fluid py-3 text-center">
                    <img src="{{ asset('assetsuser/img/contactus.jpg') }}" alt="" style="max-height: 500px; max-width: 500px !important;">
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="d-flex">
                    <div>
                        <hr class="text-black w-25" style="transform: rotate(90deg);">
                    </div>
                    <div class="text-center">
                        <p class="text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error incidunt sint id officia inventore! Odit in ratione cum placeat ipsam nulla explicabo itaque similique, aliquam laborum qui neque modi porro culpa ex ullam quaerat earum, voluptatum necessitatibus reprehenderit atque. Magni nam eos amet cumque nesciunt cupiditate doloribus neque vitae totam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="container">
        <div class="row d-flex">
            <div class="col-lg-5 py-3">
                <div class="img-fluid py-3 text-center">
                    <img src="{{ asset('assetsuser/img/contactus.jpg') }}" alt="" style="max-height: 600px; max-width: 600px !important; border-radius:5px;">
                </div>
            </div>
            <div class="col-lg-6 py-5 mx-5 my-3">
                <div class="d-flex">
                    <div class="align-items-center px-3 my-4 justify-content-center">
                        <div class="instagram mb-4 d-flex flex-shrink">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" width="35" viewBox="0 0 448 512"><style>svg{fill:#656565}</style><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                            <a href="#"><p class="text-dark py-1 px-2">@lapor_pak</p></a>
                        </div>
                        <div class="phone mb-4 d-flex flex-shrink">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" width="35" viewBox="0 0 512 512"><style>svg{fill:#656565}</style><path d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"/></svg>
                            <a href="#"><p class="text-dark py-1 px-2">+6285861210987</p></a>
                        </div>
                        <div class="facebook mb-4 d-flex flex-shrink">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" width="35" viewBox="0 0 512 512"><style>svg{fill:#656565}</style><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                            <a href="#"><p class="text-dark py-1 px-2">Lapor Pak!!!</p></a>
                        </div>
                        <div class="whatsApp mb-4 d-flex flex-shrink">
                            <svg xmlns="http://www.w3.org/2000/svg" height="35" width="35" viewBox="0 0 448 512"><style>svg{fill:#656565}</style><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            <a href="#"><p class="text-dark py-1 px-2">+6289577219870</p></a>
                        </div>
                    </div>
                </div>
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
