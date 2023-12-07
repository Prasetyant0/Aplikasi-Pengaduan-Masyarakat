<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Detail Profile | LaporPak</title>

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Admin.layout.bar.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Admin.layout.bar.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile Page</h1>
                    </div>

                    <div class="">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card shadow mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        @if ($dataProfile && $dataProfile->foto_profile)
                                            <img class="img-account-profile rounded-circle mb-2" id="image-preview"
                                                src="{{ asset('foto_profile/' . $dataProfile->foto_profile) }}"
                                                alt="" width="150">
                                        @else
                                            <img src="{{ asset('foto_profile/default.png') }}" alt=""
                                                class="img-account-profile rounded-circle mb-2" id="image-preview" width="150">
                                        @endif
                                        <div class="text-muted mt-1">{{ $dataProfile->nama_lengkap }}</div>
                                        <div class="text-muted mb-3">{{ $dataProfile->role }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form action="{{ route('Update.Profile', $dataProfile->id_users) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputNIK">NIK</label>
                                                <input class="form-control" id="inputNIK" type="text"
                                                    placeholder="Masukkan NIK" name="inputNIK"
                                                    value="{{ $dataProfile->NIK }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputNama">Nama</label>
                                                <input class="form-control" id="inputNama" type="text"
                                                    placeholder="Masukkan nama lengkap anda" name="inputNama"
                                                    value="{{ $dataProfile->nama_lengkap }}">
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEmailAddress">Email
                                                        address</label>
                                                    <input class="form-control" id="inputEmailAddress" name="inputEmail"
                                                        type="email" placeholder="Masukkan email address anda"
                                                        value="{{ $dataProfile->email }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputNoTelepon">Nomor Telepon</label>
                                                    <input class="form-control" id="inputNoTelepon"
                                                        name="inputNoTelepon" type="tel"
                                                        placeholder="Masukkan nomor telepon anda"
                                                        value="+{{ $dataProfile->no_telp }}">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputAlamat">Alamat</label>
                                                <input class="form-control" id="inputAlamat" name="inputAlamat"
                                                    type="text" placeholder="Masukkan alamat anda"
                                                    value="{{ $dataProfile->alamat }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="selectJenisKelamin" class="small mb-1">Jenis
                                                    Kelamin</label>
                                                <select name="selectJenisKelamin" id="jeniskelamin"
                                                    class="form-select form-control"
                                                    aria-label="Default select example">
                                                    <option selected value="{{ $dataProfile->jenis_kelamin }}">
                                                        {{ $dataProfile->jenis_kelamin }}</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputFoto" class="small mb-1">File Foto</label>
                                                <input type="file" class="form-control-file" id="inputFoto"
                                                    name="inputFoto" value="{{ $dataProfile->foto_profile }}">
                                            </div>
                                            <div class="float-right">
                                                <button class="btn btn-primary mx-2" type="submit"><i class="fa fa-solid fa-save"></i> Update Profile</button>
                                                <a href="{{ route('Change.Pass') }}" class="btn btn-success">Change Password <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('Admin.layout.master.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Preview Image --}}
    <script>
        const fileInput = document.getElementById('inputFoto');
        const imagePreview = document.getElementById('image-preview');

        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                imagePreview.src = reader.result;
            };
        });
    </script>
    {{-- End --}}

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
