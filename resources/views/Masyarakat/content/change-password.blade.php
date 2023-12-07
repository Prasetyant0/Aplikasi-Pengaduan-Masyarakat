<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Change</title>
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    @include('Masyarakat.navbar.navbar')

        <div class="card container g-0 my-4 shadow">
            <div class="card-header bg-primary">
                <a href="#" class="text-white"><i class="fa-solid fa-arrow-right fa-rotate-180"></i> Back </a>| Ubah Password
            </div>
            <div class="card-body">
                <form action="{{ route('Update.Password.Masyarakat') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="txtCurrentPass" class="small form-label text-dark">Password saat ini</label>
                        <input type="password" id="txtCurrentPass" class="form-control" required name="old_password">
                    </div>
                    <div class="mb-3">
                        <label for="txtNewPass" class="small form-label text-dark">Password baru</label>
                        <input type="password" id="txtNewPass" class="form-control" required name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="txtConfirmPass" class="small form-label text-dark">Konfirmasi password</label>
                        <input type="password" id="txtConfirmPass" class="form-control" required name="confirmed_password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>


    @include('Masyarakat.navbar.footer')
    {{-- Vendor JS File --}}
    <script src="{{ asset('assetsuser/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetsuser/vendor/php-email-form/validate.js') }}"></script>
    {{-- End Vendor --}}

    {{-- Template Main JS File --}}
    <script src="{{ asset('assetsuser/js/main.js') }}"></script>

    {{-- Sweetalert2 --}}
    @include('sweetalert::alert')
</body>
</html>
