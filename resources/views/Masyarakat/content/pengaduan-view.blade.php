<section class="d-flex align-items-center" id="table">
    <div class="container">
        <a href="{{ route('Form.pengaduan') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Buat
            Pengaduan</a>
        <hr>
        <table class="table table-hover" id="pengaduanTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Pengaduan</th>
                    <th>Kategori</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduanku as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->judul_pengaduan }}</td>
                        <td>{{ $d->PengaduanKategori->kategori }}</td>
                        <td>{{ $d->created_at->format('d F Y') }}</td>
                        <td>
                            @if ($d->status == 'New')
                                <button disabled="disabled" class="btn btn-sm btn-info rounded-5"
                                    style="color: #ffffff !important;">{{ $d->status }}</button>
                            @elseif ($d->status == 'Proses')
                                <button disabled="disabled" class="btn btn-sm btn-warning rounded-5"
                                style="color: #ffffff !important;">{{ $d->status }}</button>
                            @elseif ($d->status == 'Selesai')
                                <button disabled="disabled" class="btn btn-sm btn-success rounded-5"
                                style="color: #ffffff !important;">{{ $d->status }}</button>
                            @else
                                <button disabled="disabled" class="btn btn-sm btn-danger rounded-5"
                                style="color: #ffffff !important;">{{ $d->status }}</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('Detail.Pengaduan', $d->id_pengaduan) }}"
                                class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
