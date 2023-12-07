{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Rekap | LaporPak</title>

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
    <style>
        th {
            color: black;
        }

        td {
            color: black;
        }

        @media print{
            .print-none {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">
        @include('Admin.layout.bar.sidebar')

        <div id="content-wrapper">
            <div class="content">
                @include('Admin.layout.bar.topbar')
                <div class="content-wrapper px-4 mb-4">
                    <!-- Content Header (Page header) -->
                    <div class="card shadow">
                        <div class="card-header">
                            <a href="{{ route('Generate.Page') }}" class="btn btn-warning btn-md">
                                <li class="fa fa-undo"></li> Kembali
                            </a>
                            <a href="{{ route('Cetak') }}" class="btn btn-secondary btn-md float-sm-right" target="_blank">
                                <li class="fa fa-print"></li> Cetak Laporan
                            </a>
                        </div>
                        <div class="card-body report">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="h-report text-center"
                                        style="font-size: 20px; font-weight:700; color:black;"> Pengaduan Masyarakat
                                        Dusun Margasari
                                    </div>
                                    <div class="h-report-detail text-center" style="color : black;">
                                        Alamat : Jl. Banjar - Langensari No.110, Bojongkantong, Kec. Langensari, Kota
                                        Banjar,
                                        Jawa Barat 46325
                                    </div>
                                    <div class="text-center" style="color : black;">
                                        Telpon (0265)27344141
                                    </div>
                                    <div style="height: 2.5px; background-color:black;" class="mx-auto mt-2"></div>
                                    <div style="height: 1px; background-color:black; margin-top:2px !important;"
                                        class="mx-auto mb-2"></div>
                                </div>
                                <div class="col-md-12 col-lg-12" style="color:black;">
                                    Laporan Pengaduan Bulan : {{ $laporanPeriode->created_at->format('F Y') }}
                                </div>
                            </div>
                            <div class="container-responsive mt-3 mb-4">
                                <table class="table table-bordered table-hover table-report">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Kategori Pengaduan</th>
                                            <th>Nama Maysarakat</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporanPeriode as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->created_at->format('d F Y') }}</td>
                                                <td>{{ $d->PengaduanKategori->kategori }}</td>
                                                <td>{{ $d->PengirimPengaduan->nama_lengkap }}</td>
                                                <td>{{ $d->status }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <h6 style="color: black;">Margasari, {{ date('F Y') }}</h6>
                                    <h6 style="color: black;">{{ Auth::user()->role }}</h6>
                                    <br><br><br>
                                    <p style="font-weight: 700; color: black;">{{ Auth::user()->nama_lengkap }}</p>
                                </div>
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('Admin.layout.master.footer')
            <!-- End of Footer -->
        </div>
        <!-- Content Wrapper. Contains page content -->

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

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Periode</title>
    <style>
        /* CSS untuk tampilan laporan */
        body {
            font-family: Arial, sans-serif;
            margin-left: 40px;
            margin-right: 40px;
        }

        .header {
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .company-name {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        .address {
            font-size: 14px;
            text-align: center;
        }

        .address2 {
            font-size: 14px;
            text-align: center;
        }

        .phone {
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .divider {
            border-top: 3px solid #000;
            margin-top: 40px;
            margin-bottom: 2px;
        }

        .divider2 {
            border-top: 1px solid #000;
            margin-top: 2px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            font-size: 12px;
        }

        th {
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 30px;
            margin-right: 40px;
        }

        .keterangan {
            text-align: right;
            font-size: 13px;
        }

        .tanda-tangan {
            margin-top: 40px;
        }

        .nama-petugas {
            text-align: right;
            margin-top: 80px;
            font-size: 13px;
        }

        .keterangan2 {
            text-align: start;
            font-size: 14px;
        }

        .imgkiri{
            position: absolute;
            width: 130px;
            height: 130px;
            left: 40px;
            top: 5px;

        }
        .imgkanan{
            position: absolute;
            width: 130px;
            height: 130px;
            right: 40px;
            top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assetAdmin/img/banjar.png'))) }}" alt="" class="imgkiri">
        <div class="company-name">Pengaduan Masyarakat Dusun Margasari</div>
        <div class="address">Alamat : Jl. Banjar - Langensari No.110, Bojongkantong</div>
            <div class="address2">
                Kec. Langensari Kota Banjar, Jawa
                Barat 46325
            </div>
            <div class="phone">
                Telepon (0265)27344141
            </div>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assetAdmin/img/jabar.png'))) }}" alt="" class="imgkanan">
        <div class="divider"></div>
        <div class="divider2"></div>
        <div class="keterangan2">
            Laporan Pengaduan Bulan : {{ $laporanPeriode[0]->created_at->format('F Y') }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Pengaduan</th>
                <th>Kategori Pengaduan</th>
                <th>Nama Masyarakat</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanPeriode as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->created_at->format('d F Y', 'id_ID') }}</td>
                <td>{{ $d->PengaduanKategori->kategori }}</td>
                <td>{{ $d->PengirimPengaduan->nama_lengkap }}</td>
                <td>{{ $d->status }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="keterangan">Margasari, {{ date('F Y') }}</div>
        <div class="keterangan">{{ Auth::user()->role }}</div>
        <div class="nama-petugas">{{ Auth::user()->nama_lengkap }}</div>
    </div>
</body>

</html>
