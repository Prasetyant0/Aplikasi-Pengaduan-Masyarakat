<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaporPak | Add Masyarakat</title>

    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assetAdmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('Admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        @include('Admin.layout.bar.sidebar')
        <div id="content-wrapper">
            <div class="content">
                @include('Admin.layout.bar.topbar')
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('Profile.Pegawai', Auth::id()) }}">Data
                                            Masyarakat</a></li>
                                    <li class="breadcrumb-item active">Change Password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="card mb-4 shadow mx-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Change Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Update.Pass') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="txtCurrentPass" class="form-label text-dark">Password saat ini</label>
                                <input type="password" id="txtCurrentPass" class="form-control" required
                                    name="old_password" value="{{ old('old_password') }}">
                                @error('old_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="txtNewPass" class="form-label text-dark">Password baru</label>
                                <input type="password" id="txtNewPass" class="form-control" required name="new_password"
                                    value="{{ old('new_password') }}">
                                @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmed" class="form-label text-dark">Konfirmasi
                                    password</label>
                                <input type="password" id="confirmed" class="form-control" required
                                    name="confirmed_password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-solid fa-save"></i>
                                    Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @include('Admin.layout.master.footer')
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('Admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('Admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('Admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('Admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('Admin/js/demo/datatables-demo.js') }}"></script>

    @include('sweetalert::alert')
</body>

</html>
