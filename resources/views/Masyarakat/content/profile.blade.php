<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>

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

    <style>
        body {
            background-color: #f2f6fc;
            color: #69707a;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Upload new image';
            color: #fff;
            display: inline-block;
            background-color: #0d6efd;
            border-radius: 0.375rem;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            font-weight: 400;
            font-size: 1rem;
            line-height: 1.5;
            text-align: center;
        }

        .custom-file-input:hover::before {
            border-color: black;
        }

        .custom-file-input:active {
            outline: 0;
        }

    </style>

</head>

<body>
    {{-- Navbar --}}
    @include('Masyarakat.navbar.navbar')
    {{-- End Navbar --}}

    {{-- Profile --}}
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        @if ($profile && $profile->foto_profile)
                        <img class="img-account-profile rounded-circle mb-2" id="image-preview"
                            src="{{ asset('foto_profile/'. $profile->foto_profile) }}" alt="">
                        @else
                            <img src="{{ asset('foto_profile/default.png') }}" alt="" class="img-account-profile rounded-circle mb-2" id="image-preview">
                        @endif
                        <div class="font-italic text-muted mt-1">{{ $profile->nama_lengkap }}</div>
                        <div class="font-italic text-muted mb-3">{{ $profile->role }}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="{{ route('Update.Profile', $profile->id_users) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="inputNIK">Nama</label>
                                <input class="form-control" id="inputNIK" type="text"
                                    placeholder="Masukkan NIK anda" name="inputNIK" value="{{ $profile->NIK }}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputNama">Nama</label>
                                <input class="form-control" id="inputNama" type="text"
                                    placeholder="Masukkan nama lengkap anda" name="inputNama" value="{{ $profile->nama_lengkap }}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control" id="inputAlamat" name="inputAlamat" type="text"
                                        placeholder="Masukkan alamat anda" value="{{ $profile->alamat }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputNoTelepon">Nomor Telepon</label>
                                    <input class="form-control" id="inputNoTelepon" name="inputNoTelepon" type="tel"
                                        placeholder="Masukkan nomor telepon anda" value="+{{ $profile->no_telp }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmail">Email address</label>
                                <input class="form-control" id="inputEmail" name="inputEmail" type="email"
                                    placeholder="Masukkan email address anda" value="{{ $profile->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="inputFoto" class="small mb-1">File Foto</label>
                                <input type="file" class="form-control" id="inputFoto" name="inputFoto" value="{{ $profile->foto_profile }}">
                            </div>
                            <div class="mb-3">
                                <label for="selectJenisKelamin" class="small mb-1">Jenis Kelamin</label>
                                <select name="selectJenisKelamin" id="jeniskelamin" class="form-select form-control"
                                        aria-label="Default select example">
                                        <option selected value="{{ $profile->jenis_kelamin }}">{{ $profile->jenis_kelamin }}</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                            <a href="{{ route('Password.Change') }}" class="btn btn-success">Ubah Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Profile --}}

    {{-- Footer --}}
    @include('Masyarakat.navbar.footer')
    {{-- End Footer --}}

    {{-- Preview Image --}}
    <script>
        const fileInput = document.getElementById('inputFoto');
        const imagePreview = document.getElementById('image-preview');

        fileInput.addEventListener('change', function () {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                imagePreview.src = reader.result;
            };
         });
    </script>
    {{-- End --}}

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
