<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Laporan | LaporPak</title>

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
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Generate Laporan</h1>
                    </div>
                </div>
                <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="container">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Laporan Periode</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('Laporan.Periode') }}" method="get">
                                            <div class="form form-group">
                                                <label for="selectBulan">
                                                    Pilih Bulan
                                                </label>
                                                <select name="selectBulan" id="selectBulan" class="form form-control">
                                                    <option value="">-- Pilih Bulan --</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="form form-group">
                                                <label for="selectTahun">Pilih Tahun</label>
                                                <select name="selectTahun" id="selectTahun" class="form form-control">
                                                    <option value="">-- Pilih Tahun --</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>
                                            <div class="form form-group">
                                                <label for="selectStatus">Pilih Status</label>
                                                <select name="selectStatus" id="selectStatus" class="form form-control">
                                                    <option value="" selected>ALL</option>
                                                    <option value="Proses">Process</option>
                                                    <option value="Selesai">Selesai</option>
                                                </select>
                                            </div>
                                            <div class="form form-group">
                                                <button type="submit" class="btn btn-primary btn-md">
                                                    <li class="fa fa-print"></li> Cetak
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="container">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Laporan Rekap Periode</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('Cetak') }}" method="get">
                                        <div class="form form-group">
                                            <label for="selectBulan">
                                                Pilih Bulan
                                            </label>
                                            <select name="selectBulan" id="selectBulan" class="form form-control">
                                                <option value="">-- Pilih Bulan --</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form form-group">
                                            <label for="selectTahun">Pilih Tahun</label>
                                            <select name="selectTahun" id="selectTahun" class="form form-control">
                                                <option value="">-- Pilih Tahun --</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form form-group">
                                            <button class="btn btn-primary btn-md" type="submit"><li class="fa fa-print"></li> Cetak</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
            </div>
            <!-- Footer -->
            @include('Admin.layout.master.footer')
            <!-- End of Footer -->
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
