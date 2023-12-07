<?php

namespace App\Http\Controllers;

use Dompdf\Options;
use App\Models\User;
use App\Models\Kategori;
use Dompdf\Dompdf;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pengaduan = Pengaduan::with(['PengaduanKategori', 'PengirimPengaduan'])->get();
        $masyarakatCount = User::where('role', 'Masyarakat')->count();
        $kategoriCount = Kategori::count();
        $pengaduanCount = Pengaduan::count();
        $laporanNew = Pengaduan::where('status', 'New')->count();
        return view('Admin.dashboard', compact('pengaduan','masyarakatCount','kategoriCount','pengaduanCount','laporanNew'));
    }

    public function updateStatus(Request $request, $id_pengaduan)
    {
        $pengaduanStatus = Pengaduan::find($id_pengaduan);
        $pengaduanStatus->update([
            'status' => $request->input('updateStatus')
        ]);

        $pengaduanStatus->save();

        return redirect()->back()->with('success', 'Status berhasil di update.');
    }
    public function dataMasyarakat()
    {
        $dataMasyarakat = User::where('role', 'Masyarakat')->get();
        return view('Admin.layout.content.DataMasyarakat.data-masyarakat', compact('dataMasyarakat'));
    }

    public function simpanMasyarakat(Request $request)
    {
        $request->validate([
            'inputNIK' => 'required|integer|min:16',
            'inputNama' => 'required|string',
            'inputNoTelp' => 'required|integer|min:10',
            'inputAlamat' => 'required',
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:8',
            'fileFoto' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('fileFoto')) {
            $foto = $request->file('fileFoto');
            $fotoName = 'Masyarakat' . Carbon::now()->format('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $foto->move('foto_profile/', $fotoName);

            $dataMasyarakat = new User();
            $dataMasyarakat->NIK = $request->inputNIK;
            $dataMasyarakat->nama_lengkap = $request->inputNama;
            $dataMasyarakat->no_telp = $request->inputNoTelp;
            $dataMasyarakat->alamat = $request->inputAlamat;
            $dataMasyarakat->email = $request->inputEmail;
            $dataMasyarakat->password = password_hash($request->inputPassword, PASSWORD_DEFAULT);
            $dataMasyarakat->foto_profile = $fotoName;
            $dataMasyarakat->role = 'Masyarakat';

            $dataMasyarakat->save();

            return redirect()->route('Data.Masyarakat')->with('success', 'Data masyarakat berhasil disimpan.');
        }
        return redirect()->back()->with('error', 'Input data yang benar!');
    }

    public function showDataMasyarakat($id_users)
    {
        $dataMasyarakat = User::findOrFail($id_users);
        return view('Admin.layout.content.DataMasyarakat.edit-masyarakat', compact('dataMasyarakat'));
    }

    public function editMasyarakat(Request $request, $id_users)
    {
        $dataMasyarakat = User::find($id_users);
        $isChanged = false;

        if ($request->hasFile('fileFoto')) {
            if ($dataMasyarakat->foto_profile) {
                $fotoPath =public_path('foto_profile/' . $dataMasyarakat->foto_profile);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }
            $foto = $request->file('fileFoto');
            $fotoName = 'Masyarakat' . Carbon::now()->format('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_profile/'), $fotoName);
            $dataMasyarakat->foto_profile = $fotoName;
            $isChanged = true;
        }
        if ($dataMasyarakat->nama_lengkap != $request->inputNama) {
            $dataMasyarakat->nama_lengkap = $request->inputNama;
            $isChanged = true;
        }
        if ($dataMasyarakat->NIK != $request->inputNIK) {
            $dataMasyarakat->NIK = $request->inputNIK;
            $isChanged = true;
        }
        if ($dataMasyarakat->jenis_kelamin != $request->selectJenisKelamin) {
            $dataMasyarakat->jenis_kelamin = $request->selectJenisKelamin;
            $isChanged = true;
        }
        if ($dataMasyarakat->alamat != $request->inputAlamat) {
            $dataMasyarakat->alamat = $request->inputAlamat;
            $isChanged = true;
        }
        if ($dataMasyarakat->no_telp != $request->inputNoTelp) {
            $dataMasyarakat->no_telp = $request->inputNoTelp;
            $isChanged = true;
        }
        if ($dataMasyarakat->email != $request->inputEmail) {
            $dataMasyarakat->email = $request->inputEmail;
            $isChanged = true;
        }
        if (!$isChanged) {
            return redirect()->route('Data.Masyarakat')->with('info', 'Tidak ada perubahan data.');
        }

        $dataMasyarakat->save();
        return redirect()->route('Data.Masyarakat')->with('success', 'Data berhasil di perbaharui.');
    }

    public function dataPegawai()
    {
        $pegawai = User::whereIn('role', ['Admin', 'Petugas'])->get();
        return view('Admin.layout.content.DataPegawai.data-pegawai', compact('pegawai'));
    }

    public function simpanPegawai(Request $request)
    {
        $request->validate([
            'inputNIK' => 'required|integer|min:16',
            'inputNama' => 'required|string',
            'inputNoTelp' => 'required|integer|min:10',
            'inputAlamat' => 'required',
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:8',
            'fileFoto' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('fileFoto')) {
        $foto = $request->file('fileFoto');
        $fotoName = 'Pegawai' . Carbon::now()->format('YmdHis') . '.' . $foto->getClientOriginalExtension();
        $foto->move('foto_profile/', $fotoName);

        $dataPegawai = new User();
        $dataPegawai->NIK = $request->inputNIK;
        $dataPegawai->nama_lengkap = $request->inputNama;
        $dataPegawai->no_telp = $request->inputNoTelp;
        $dataPegawai->alamat = $request->inputAlamat;
        $dataPegawai->email = $request->inputEmail;
        $dataPegawai->password = password_hash($request->inputPassword, PASSWORD_DEFAULT);
        $dataPegawai->foto_profile = $fotoName;
        $dataPegawai->role = $request->selectJabatan;

        $dataPegawai->save();

        return redirect()->route('Data.Pegawai')->with('success', 'Data masyarakat berhasil disimpan.');
        }
        return redirect()->back()->with('error', 'Input data yang benar!');
    }

    public function showDataPegawai($id_users)
    {
        $dataPegawai = User::find($id_users);
        return view('Admin.layout.content.DataPegawai.edit-pegawai', compact('dataPegawai'));
    }

    public function editPegawai(Request $request, $id_users)
    {
        $dataMasyarakat = User::find($id_users);
        $isChanged = false;

        if ($request->hasFile('fileFoto')) {
            if ($dataMasyarakat->foto_profile) {
            $fotoPath =public_path('foto_profile/' . $dataMasyarakat->foto_profile);
                if (File::exists($fotoPath)) {
                File::delete($fotoPath);
                }
            }
        $foto = $request->file('fileFoto');
        $fotoName = 'Pegawai' . Carbon::now()->format('YmdHis') . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('foto_profile/'), $fotoName);
        $dataMasyarakat->foto_profile = $fotoName;
        $isChanged = true;
        }
        if ($dataMasyarakat->nama_lengkap != $request->inputNama) {
            $dataMasyarakat->nama_lengkap = $request->inputNama;
            $isChanged = true;
        }
        if ($dataMasyarakat->NIK != $request->inputNIK) {
            $dataMasyarakat->NIK = $request->inputNIK;
            $isChanged = true;
        }
        if ($dataMasyarakat->jenis_kelamin != $request->selectJenisKelamin) {
            $dataMasyarakat->jenis_kelamin = $request->selectJenisKelamin;
            $isChanged = true;
        }
        if ($dataMasyarakat->alamat != $request->inputAlamat) {
            $dataMasyarakat->alamat = $request->inputAlamat;
            $isChanged = true;
        }
        if ($dataMasyarakat->no_telp != $request->inputNoTelp) {
            $dataMasyarakat->no_telp = $request->inputNoTelp;
            $isChanged = true;
        }
        if ($dataMasyarakat->email != $request->inputEmail) {
            $dataMasyarakat->email = $request->inputEmail;
            $isChanged = true;
        }
        if (!$isChanged) {
            return redirect()->route('Data.Pegawai')->with('info', 'Tidak ada perubahan data.');
        }

        $dataMasyarakat->save();
        return redirect()->route('Data.Pegawai')->with('success', 'Data berhasil di perbaharui.');
    }

    public function KategoriPengaduan()
    {
        $kategori = Kategori::all();
        return view('Admin.layout.content.KategoriPage.kategori', compact('kategori'));
    }

    public function simpanKategori(Request $request)
    {
        $request->validate([
            'inputNamaKategori' => 'required|string',
            'txtDeskripsi' => 'required|string'
        ]);

        $kategoriPengaduan = new Kategori;
        $kategoriPengaduan->kategori = $request->inputNamaKategori;
        $kategoriPengaduan->deskripsi = $request->txtDeskripsi;

        $kategoriPengaduan->save();
        return redirect()->route('Kategori.Pengaduan')->with('success', 'Kategori baru berhasil disimpan.');
    }

    public function editKategori($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        return view('Admin.layout.content.KategoriPage.edit-kategori', compact('kategori'));
    }

    public function updateKategori(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $isChanged = false;

        if ($kategori->kategori != $request->inputNamaKategori) {
            $kategori->kategori = $request->inputNamaKategori;
            $isChanged = true;
        }

        if ($kategori->deskripsi != $request->txtDeskripsi) {
            $kategori->deskripsi = $request->txtDeskripsi;
            $isChanged = true;
        }

        if (!$isChanged) {
            return redirect()->route('Kategori.Pengaduan')->with('info', 'Tidak ada perubahan data.');
        }

        $kategori->save();
        return redirect()->route('Kategori.Pengaduan')->with('success', 'Kategori pengaduan berhasil di perbaharui.');
    }

    public function laporanMasuk(Request $request)
    {
        $laporan = Pengaduan::with(['PengaduanKategori', 'PengirimPengaduan'])->get();
        $kategoris = Kategori::all();
        return view('Admin.layout.content.LaporanMasuk.laporan-masuk', compact('laporan', 'kategoris'));
    }

    public function detailLaporan(Request $request, $id_pengaduan)
    {
        $laporanDetail = Pengaduan::findOrFail($id_pengaduan);
        $tanggapanLaporan = Tanggapan::where('pengaduan_id', $id_pengaduan)->get();
        return view('Admin.layout.content.detail-laporan', compact('laporanDetail', 'tanggapanLaporan'));
    }

    public function changeStatus(Request $request, $id_pengaduan)
    {
        DB::table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update(['status' => 'Proses']);

        return response()->json(['message' => 'Status laporan berhasil diubah'], 200);
    }

    public function generatePage()
    {
        return view('Admin.layout.content.GenerateLaporan.generate-laporan');
    }

    public function detailProfilePage($id_users)
    {
        $profileData = User::find($id_users);
        return view('Admin.layout.content.detail-profile', compact('profileData'));
    }

    public function profilePegawai($id_users, Request $request)
    {
        $dataProfile = User::findOrFail($id_users);
        return view('Admin.layout.content.profile-admin', compact('dataProfile'));
    }

    public function pageChangePass()
    {
        return view('Admin.layout.change-pass');
    }

    public function updatePasswordPegawai(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirmed_password' => 'required|min:8|same:new_password'
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();

            return redirect()->route('Profile.Pegawai', Auth::id())->with('success', 'Password berhasil di ubah.');
        } else {
            return redirect()->back()->with('error', 'Password lama salah!');
        }
    }

    function bulanIndonesia($bulan)
    {
        $namaBulan = [
            '01' => "Januari",
            '02' => "Februari",
            '03' => "Maret",
            '04' => "April",
            '05' => "Mei",
            '06' => "Juni",
            '07' => "Juli",
            '08' => "Agustus",
            '09' => "September",
            '10' => "Oktober",
            '11' => "November",
            '12' => "Desember"
        ];

        return $namaBulan;
    }


    public function CetakLaporanPdf(Request $request)
    {
        $bulan = $request->input('selectBulan');
        $tahun = $request->input('selectTahun');
        $status = $request->input('selectStatus');

        $laporanPeriodeQuery = Pengaduan::with(['PengaduanKategori','PengirimPengaduan'])
        ->whereMonth('created_at', $bulan)
        ->whereYear('created_at', $tahun);

        // Periksa apakah $status kosong
        if (!empty($status)) {
        $laporanPeriodeQuery->where('status', $status);
        }

        $laporanPeriode = $laporanPeriodeQuery->get();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf->setOptions($options);

        $html = View::make('Admin.layout.content.GenerateLaporan.pagePeriode', compact('laporanPeriode'))->render();

        $dompdf->loadHtml(ob_get_clean());
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Simpan PDF dalam variabel $pdfString
        $laporanPeriode = $dompdf->output();

        // Arahkan pengguna ke tampilan pratinjau PDF
        return view('Admin.layout.content.GenerateLaporan.pdf', ['laporanPeriode' => $laporanPeriode , 'bulan' => $bulan, 'tahun' => $tahun]);
    }

    public function CetakRekap(Request $request)
    {
        $bulan = $request->input('selectBulan');
        $tahun = $request->input('selectTahun');

        // Mengambil semua kategori
        $kategori = Kategori::all();

        // Menyiapkan array untuk menyimpan jumlah pengaduan per kategori
        $dataKategori = [];

        // Mendapatkan jumlah pengaduan per kategori
        foreach ($kategori as $kat) {
        $jumlah_pengaduan = Pengaduan::whereMonth('created_at', $bulan)
        ->whereYear('created_at', $tahun)
        ->where('kategori_id', $kat->id_kategori)
        ->count();

        // Menambahkan data ke array $dataKategori
        $dataKategori[] = [
        'kategori' => $kat,
        'jumlah_pengaduan' => $jumlah_pengaduan,
        ];
        }

        // Menginisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf->setOptions($options);

        // Mengirim data ke view untuk ditampilkan pada PDF
        $view = view('Admin.layout.content.GenerateLaporan.pageRekapPeriode')
        ->with('dataKategori', $dataKategori)
        ->render();

        // Memuat data ke Dompdf
        $dompdf->loadHtml($view);

        // Merender data
        $dompdf->render();

        // Menyimpan PDF dalam variabel $pdfString
        $laporanPeriode = $dompdf->output();

        return view('Admin.layout.content.GenerateLaporan.pdf', ['laporanPeriode' => $laporanPeriode]);

    }
}
