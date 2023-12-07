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
            font-size: 24px;
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
        }

        th,
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
        }

        .tanda-tangan {
            margin-top: 40px;
        }

        .nama-petugas {
            text-align: end;
            margin-top: 100px;
        }

        .keterangan2 {
            text-align: start;
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
        <div class="address">Alamat : Jl. Banjar - Langensari No.110, Bojongkantong, Kec. Langensari</div>
            <div class="address2">
                Kota Banjar, Jawa
                Barat 46325
            </div>
            <div class="phone">
                Telepon (0265)27344141
            </div>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assetAdmin/img/jabar.png'))) }}" alt="" class="imgkanan">
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
                <th>Tanggal Pengaduan</th>
                <th>Kategori Pengaduan</th>
                <th>Nama Masyarakat</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>01/06/2023</td>
                <td>Kategori A</td>
                <td>Nama Masyarakat 1</td>
                <td>Selesai</td>
                <td>Keterangan 1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>02/06/2023</td>
                <td>Kategori B</td>
                <td>Nama Masyarakat 2</td>
                <td>Dalam Proses</td>
                <td>Keterangan 2</td>
            </tr>
            <!-- Tambahkan baris sesuai data Anda -->
        </tbody>
    </table>

    <div class="footer">
        <div class="keterangan">Banjar, Juni 2023</div>
        <div class="keterangan">Petugas</div>
        <div class="nama-petugas">Romi</div>
    </div>
</body>

</html>
