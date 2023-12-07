<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan | Detail</title>
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
        <!-- Sidebar -->
        @include('Admin.layout.bar.sidebar')
        <!-- End of Sidebar -->

        {{-- d-flex flex-coloumn --}}
        <div id="content-wrapper" class="">
            <div class="content">
                <!-- Topbar -->
                @include('Admin.layout.bar.topbar')
                <!-- End of Topbar -->

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="h3 mb-0 text-gray-800">Detail Laporan</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('Laporan.Masuk') }}">Laporan Masuk</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mx-3 shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Laporan Masuk</h6>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="judulPengaduan">Judul</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    : {{ $laporanDetail->judul_pengaduan }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="judulPengaduan">Kategori Pengaduan</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    : {{ $laporanDetail->PengaduanKategori->kategori }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="tanggalLaporan">Tanggal Laporan</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    : {{ $laporanDetail->created_at->format('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="namaPelapor">NIK Pelapor</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    : {{ $laporanDetail->PengirimPengaduan->NIK }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="namaPelapor">Nama Pelapor</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    : {{ $laporanDetail->PengirimPengaduan->nama_lengkap }}
                                                </div>
                                            </div>
                                            <form action="{{ route('Update.Status', $laporanDetail->id_pengaduan) }}"
                                                method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="statusLaporan">Status</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select name="updateStatus" id="select" class="form-control">
                                                            <option value="{{ $laporanDetail->status }}">
                                                                {{ $laporanDetail->status }}</option>
                                                            <option value="Proses">Proses</option>
                                                            <option value="Selesai">Selesai</option>
                                                            <option value="Di Tolak">Di Tolak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-outline-primary btn-md btn-block">
                                            <li class="fa fa-retweet"></li> Update Status
                                        </button>
                                    </div>
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <img src="{{ asset('foto_lampiran/' . $laporanDetail->foto_lampiran) }}"
                                                alt="" class="img img-fluid" style="border-radius: 10px;">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <p class="post">
                                                {{ $laporanDetail->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>

                                    {{-- <div class="container tanggapan shadow rounded-1 border-1"
                                            style="background-color: white;"> --}}
                                    <div class="mx-1">
                                        @foreach ($tanggapanLaporan as $tanggapan)
                                            <div class="profile py-2 d-flex">
                                                <img src="{{ asset('foto_profile/' . $tanggapan->PengirimTanggapan->foto_profile) }}"
                                                    alt="" class="rounded-circle" width="40" height="40">
                                                <div class="name-role px-2" style="line-height: 2px">
                                                    <p class=""
                                                        style="font-size: 15px !important; font-weight:700; color:#007bff; position: relative; top:11px;">
                                                        {{ $tanggapan->PengirimTanggapan->nama_lengkap }}</p>
                                                    <hr
                                                        style="position: relative; opacity:0 !important; position: relative; top:3px;">
                                                    <p class=""
                                                        style="font-size: 12px !important; position: relative; bottom:5px;">
                                                        di tanggapi tanggal
                                                        {{ $tanggapan->created_at->format('d F Y') }}</p>
                                                </div>
                                            </div>
                                            <p class="text-dark mx-5">{{ $tanggapan->tanggapan }}</p>
                                        @endforeach
                                    </div>
                                    <form action="{{ route('Post.Tanggapan') }}" method="post" class="py-2"
                                        id="form-tanggapan">
                                        @csrf
                                        <input type="hidden" name="id_pengaduan"
                                            value="{{ $laporanDetail->id_pengaduan }}">
                                        <div class="d-flex">
                                            <input type="text" name="tanggapan" id="tanggapan"
                                                class="form-control"
                                                style="background-color: #e2e2e2; font-size:15px;"
                                                placeholder="Ketik disini untuk tanggapan..." autocomplete="off"
                                                required>
                                            <button type="submit" class="btn btn-success btn-md mx-1"><i
                                                    class="fa-solid fa-paper-plane"
                                                    style="color: #ffffff;"></i></button>
                                        </div>
                                    </form>
                                    {{-- </div> --}}

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
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
