<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap</title>
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

        .imgkiri {
            position: absolute;
            width: 130px;
            height: 130px;
            left: 40px;
            top: 5px;

        }

        .imgkanan {
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
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assetAdmin/img/banjar.png'))) }}"
            alt="" class="imgkiri">
        <div class="company-name">Pengaduan Masyarakat Dusun Margasari</div>
        <div class="address">Alamat : Jl. Banjar - Langensari No.110, Bojongkantong</div>
        <div class="address2">
            Kec. Langensari Kota Banjar, Jawa
            Barat 46325
        </div>
        <div class="phone">
            Telepon (0265)27344141
        </div>
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assetAdmin/img/jabar.png'))) }}"
            alt="" class="imgkanan">
        <div class="divider"></div>
        <div class="divider2"></div>
        <div class="keterangan2">
            Laporan Pengaduan Bulan :
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Jumlah Pengaduan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKategori as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d['kategori']->kategori }}</td>
                    <td>{{ $d['jumlah_pengaduan'] }}</td>
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
