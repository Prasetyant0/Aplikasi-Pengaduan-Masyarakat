<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail | Pengaduan</title>

    {{-- Favicon --}}
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
    <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- Vendor Css File --}}
    <link href="{{ asset('assetsuser/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- My Css --}}
    <link href="{{ asset('assetsuser/css/style.css') }}" rel="stylesheet">

</head>
<style>
    .portfolio-info {
        color: #656565 !important;
        background-color: #ffffff !important;
    }

    .portfolio-description {
        color: #656565 !important;
    }
</style>

<body style="background-color: #f4f4f4 !important;">
    @include('Masyarakat.navbar.navbar')

    <main id="main">
        <section id="portfolio-details" class="portfolio-details">
            <div class="container table-responsive">
                <a href="{{ route('Pengaduanku') }}" class="btn btn-warning btn-md"><i
                        class="fa-solid fa-arrow-left"></i> Kembali</a>
                <hr style="color: black;">
                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <img src="{{ asset('foto_lampiran/' . $pengaduan->foto_lampiran) }}"
                                    alt="Image Not Found!" class="img-fluid rounded-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info shadow-md rounded-1">
                            <h3>{{ $pengaduan->judul_pengaduan }}</h3>
                            <ul>
                                <li><strong>Kategori</strong>: {{ $pengaduan->PengaduanKategori->kategori }}</li>
                                <li><strong>Tanggal Pengaduan</strong>: {{ $pengaduan->created_at->format('d F Y') }}</li>
                                <li><strong>Status Pengaduan</strong>:
                                    @if ($pengaduan->status == 'New')
                                        <button type="button" disabled
                                        class="btn btn-info btn-sm rounded-5">{{ $pengaduan->status }}</button>
                                    @elseif ($pengaduan->status == 'Proses')
                                        <button type="button" disabled
                                        class="btn btn-warning btn-sm rounded-5">{{ $pengaduan->status }}</button>
                                    @elseif ($pengaduan->status == 'Selesai')
                                        <button type="button" disabled
                                        class="btn btn-success btn-sm rounded-5">{{ $pengaduan->status }}</button>
                                    @else
                                        <button type="button" disabled
                                        class="btn btn-danger btn-sm rounded-5">{{ $pengaduan->status }}</button>
                                    @endif

                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <p class="text-justify">
                                {{ $pengaduan->deskripsi }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="portfolio-details tanggapan-section">
            <div class="container tanggapan shadow rounded-1 border-1" style="background-color: white;">
                <div class="row px-3">
                    <p class="text-dark mt-2 text-center" style="font-size:20px; font-weight:700; opacity:0.90;">
                        Tanggapan</p>
                    <hr class="text-secondary">
                    {{-- @dd($tanggapan) --}}
                    @foreach ($tanggapan as $data)
                        <div class="profile py-2 d-flex">
                            <img src="{{ asset('foto_profile/' . $data->PengirimTanggapan->foto_profile) }}"
                                alt="" class="rounded-5" width="40" height="40">
                            <div class="name-role px-2" style="line-height: 2px">
                                <p class=""
                                    style="font-size: 15px !important; font-weight:600; color:#007bff; position: relative; top:11px;">
                                    {{ $data->PengirimTanggapan->nama_lengkap }}</p>
                                <hr class="text-dark"
                                    style="position: relative; opacity: 0; position: relative; top:3px;">
                                <p class="text-secondary"
                                    style="font-size: 12px !important; position: relative; bottom:5px;">
                                    di tanggapi tanggal
                                    {{ $data->created_at->format('d F Y', 'id_ID') }}</p>
                            </div>
                        </div>
                        <p class="text-dark mx-5">{{ $data->tanggapan }}</p>
                    @endforeach
                </div>
                <form action="{{ route('Post.Tanggapan') }}" method="post" class="py-2" id="form-tanggapan">
                    @csrf
                    <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                    <div class="d-flex">
                        <input type="text" name="tanggapan" id="tanggapan" class="form-control"
                            style="background-color: #e2e2e2; font-size:15px;"
                            placeholder="Ketik disini untuk balas tanggapan..." autocomplete="off" required>
                        <button type="submit" class="btn btn-success btn-md mx-1"><i class="fa-solid fa-paper-plane"
                                style="color: #ffffff;"></i></button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    @include('Masyarakat.navbar.footer')

    {{-- CDN Jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- <script>
        $(document).on('submit', '#form-tanggapan', function (e) {
            e.preventDefault();
            const data = $(this).serialize();
            axios.post('/post-tanggapan', data)
                .then(function(response){
                    if (response.status === 200) {

                    } else {

                    }
                })
                .catch(function(error){

                });
        });
    </script> --}}
</body>

</html>
