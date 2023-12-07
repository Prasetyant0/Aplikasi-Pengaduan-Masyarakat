<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Masuk | LaporPak</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Laporan Masuk</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 float-right">
                                    <label for="filter">Filter Berdasarkan Status</label>
                                    <select name="filterStatus" id="filter-by-status" class="form form-control">
                                        <option value="">-- Filter Status --</option>
                                        <option value="New">New</option>
                                        <option value="Proses">Process</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Di Tolak">Ditolak</option>
                                    </select>
                                </div>
                                <div class="col-md-3 float-right">
                                    <label for="filter">Filter Berdasarkan Kategori</label>
                                    <select name="filter" id="filter-by-kategori" class="form form-control">
                                        <option value="">-- Filter Kategori --</option>
                                        @foreach ($kategoris as $item)
                                            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Judul Pengaduan</th>
                                            <th>Nama Pengadu</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Judul Pengaduan</th>
                                            <th>Nama Pengadu</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($laporan as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->created_at->format('d F Y') }}</td>
                                                <td>{{ $data->judul_pengaduan }}</td>
                                                <td>{{ $data->PengirimPengaduan->nama_lengkap }}</td>
                                                <td id="kategori">{{ $data->PengaduanKategori->kategori }}</td>
                                                <td id="status">
                                                    @if ($data->status == 'New')
                                                        <span class="badge badge-info">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'Proses')
                                                        <span class="badge badge-warning">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'Selesai')
                                                        <span class="badge badge-success">{{ $data->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('Detail.Laporan', $data->id_pengaduan) }}"
                                                        class="btn btn-primary btn-sm btn-change"><i
                                                            class="fas fa-solid fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('Admin.layout.master.footer')
            <!-- End of Footer -->
        </div>
    </div>

    <script>
        // Ambil elemen select filter status dan filter kategori
        const filterStatus = document.getElementById('filter-by-status');
        const filterCategory = document.getElementById('filter-by-kategori');

        // Ambil tabel dan semua baris dalam tabel
        const table = document.getElementById('dataTable');
        const rows = table.querySelectorAll('tbody tr');

        // Simpan data asli tabel
        const originalData = Array.from(rows).map(row => ({
            row: row,
            display: row.style.display,
        }));

        // Tambahkan event listener untuk perubahan pada filter status dan filter kategori
        filterStatus.addEventListener('change', filterTable);
        filterCategory.addEventListener('change', filterTable);

        function filterTable() {
            const selectedStatus = filterStatus.value;
            const selectedCategory = filterCategory.value;

            // Loop melalui semua baris dalam tabel
            originalData.forEach(data => {
                const statusCell = data.row.querySelector('#status');
                const categoryCell = data.row.querySelector(
                '#kategori'); // Ganti dengan indeks kolom kategori yang sesuai

                // Jika tidak ada yang dipilih atau status dan kategori cocok dengan yang dipilih, tampilkan baris
                if (
                    (selectedStatus === '' || statusCell.textContent.includes(selectedStatus)) &&
                    (selectedCategory === '' || categoryCell.textContent === selectedCategory)
                ) {
                    data.row.style.display = data.display;
                } else {
                    data.row.style.display = 'none';
                }
            });
        }
    </script>

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
