<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaporPak | Edit Kategori</title>

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
                                <h1 class="h3 mb-0 text-gray-800">Edit Kategori Pengaduan</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('Kategori.Pengaduan') }}">List Kategori</a></li>
                                    <li class="breadcrumb-item active">Form Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="card shadow mb-4 mx-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori Pengaduan</h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('Update.Kategori', $kategori->id_kategori) }}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form form-group">
                                    <label for="txtKategori">Nama Kategori</label>
                                    <input type="text" name="inputNamaKategori" id="txtKategori" class="form-control" placeholder="Contoh : infrastruktur" value="{{ $kategori->kategori }}" required>
                                </div>
                                <div class="form form-group">
                                    <label for="txtDeskripsi">Deskripsi</label>
                                    <textarea name="txtDeskripsi" id="txtDeskripsi" class="form-control" required>{{ $kategori->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-success btn-md float-right"><li class="fa fa-save"></li> Simpan</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
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
