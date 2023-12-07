<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APM | Register</title>

    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="assetAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assetAdmin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color: #79CCDA;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan isi data diri!</h1>
                            </div>
                            <form class="user" action="{{ route('register-post') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="inputNik" placeholder="NIK" name="inputNik" required autofocus
                                            value="{{ old('inputNik') }}" pattern="[0-9]+">
                                        @error('inputNik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="inputEmail"
                                            placeholder="Email" name="inputEmail" required
                                            value="{{ old('inputEmail') }}">
                                        @error('inputEmail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="inputNama"
                                            placeholder="Nama Lengkap" name="inputNama" required
                                            value="{{ old('inputNama') }}">
                                        @error('inputNama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="inputNoTelepon" placeholder="Nomor Telepon (628...)"
                                            name="inputNoTelepon" required value="{{ old('inputNoTelepon') }}" pattern="[0-9]+">
                                        @error('inputNoTelepon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="inputAlamat"
                                            placeholder="Alamat" name="inputAlamat" required
                                            value="{{ old('inputAlamat') }}">
                                        @error('inputAlamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="inputPassword"
                                            placeholder="Password" name="inputPassword" required
                                            value="{{ old('inputPassword') }}">
                                        @error('inputPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select name="pilihJenisKelamin" id="jeniskelamin" class="form-select form-control"
                                        aria-label="Default select example">
                                        <option selected>--Pilih Jenis Kelamin--</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    @error('pilihJenisKelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <input class="fomr-control-file" name="foto_profile" type="file"
                                            id="formFileMultiple" multiple required>
                                        @error('foto_profile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-login btn-user btn-block">Daftarkan
                                    Akun</button>
                                <hr>
                                <a href="{{ route('google.login') }}" class="btn btn-google btn-user btn-block">
                                    <img src="assetAdmin/img/assetLogin/google.svg" class="img-thumbnail"
                                        width="30">
                                    Login with Google
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/login">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <script>
        function validateNIK(inputNik) {
            if (inputNik.length > 16 || inputNik.length < 16) {
                alert("NIK harus 16 karakter!")
                return false;
            }
            return true;
        }
    </script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="assetAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="assetAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assetAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assetAdmin/js/sb-admin-2.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
