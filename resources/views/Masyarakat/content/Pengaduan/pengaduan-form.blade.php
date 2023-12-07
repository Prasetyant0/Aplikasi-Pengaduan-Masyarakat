<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan | Form</title>

    <!-- Favicons -->
  <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="icon">
  <link href="{{ asset('assetsuser/img/thumbnail.svg') }}" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetsuser/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsuser/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assetsuser/css/style.css') }}" rel="stylesheet">

</head>
<style>
  label{
    color: #484848 !important;
  }
</style>
<body style="background-color: #f4f4f4;">
  {{-- Navbar --}}
    @include('Masyarakat.navbar.navbar')
  {{-- End Navbar --}}

  {{-- Main --}}
  <main id="main">

        <section class="inner-page">
            <div class="container table-responsive">
                <a href="{{ route('Pengaduanku') }}" class="btn btn-warning btn-md"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                <hr style="color: black;">
                <form action="{{ route('Kirim.Pengaduan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form form-group">
                            <label for="textJudulPengaduan">Judul Pengaduan</label>
                            <input type="text" class="form form-control" name="JudulPengaduan" id="textJudulPengaduan" placeholder="Ketikkan judul pengaduan..." autofocus autocomplete="off" required value="{{ old('JudulPengaduan') }}">
                        </div>
                        <div class="form form-group mt-3">
                            <label for="textAlamatPengaduan">Alamat Kejadian</label>
                            <input type="text" class="form form-control" name="Alamat" id="textAlamatPengaduan" placeholder="Ketikkan alamat kejadian..." autocomplete="off" required value="{{ old('Alamat') }}">
                        </div>
                        <div class="form form-group mt-3">
                            <label for="selectKategoriPengaduan">Kategori Pengaduan</label>
                            <select type="text" class="form form-control" name="KategoriPengaduan" id="selectKategoriPengaduan">
                                <option value="" selected>-- Pilih Kategori Pengaduan --</option>
                                @foreach ($kategori as $d)
                                <option value="{{ $d->id_kategori }}">{{ $d->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form form-group mt-3">
                            <label for="textIsiPengaduan">Isi Pengaduan</label>
                            <textarea name="IsiPengaduan" class="form form-control" id="" cols="30"
                                rows="10" placeholder="Ketik secara rinci pengaduanmu..." autocomplete="off" required value="{{ old('IsiPengaduan') }}"></textarea>
                        </div>
                        <div class="form form-group mt-3">
                            <label for="filePengaduan">Lampiran Foto Pengaduan</label> <br>
                            <input type="file" name="FotoPengaduan" id="filePengaduan" class="form form-control"
                                accept="image" required value="{{ old('FotoPengaduan') }}">
                                @error('FotoPengaduan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="form form-group mt-4">
                            <button type="submit" class="btn btn-success btn-md"> Simpan <i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>

    </main>
    <!-- End Main -->

</body>
</html>
