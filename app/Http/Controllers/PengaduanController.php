<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function formPengaduan()
    {
        $kategori = Kategori::all();
        return view('Masyarakat.content.Pengaduan.pengaduan-form', compact('kategori'));
    }

    public function KirimPengaduan(Request $request)
    {
        $request->validate([
            'JudulPengaduan' => 'required',
            'Alamat' => 'required',
            'KategoriPengaduan' => 'required',
            'IsiPengaduan' => 'required',
            'FotoPengaduan' => 'required|mimes:png,jpg,jpeg,svg|max:2048'
        ],[
            'FotoPengaduan.mimes' => 'Format foto harus (png,jpg,jpeg,svg)!',
            'FotoPengaduan.max' => 'Ukuran foto maksimal 2mb!',
        ]);

        if ($request->hasFile('FotoPengaduan')) {
            $foto = $request->file('FotoPengaduan');
            $extension = $foto->getClientOriginalExtension();
            $fotoName = 'Pengaduan' . Carbon::now()->format('YmdHis') . '.' . $extension;
            $foto->move('foto_lampiran/', $fotoName);

            $dataPengaduan = new Pengaduan();
            $dataPengaduan->users_id = Auth::id();
            $dataPengaduan->judul_pengaduan = $request->input('JudulPengaduan');
            $dataPengaduan->alamat = $request->input('Alamat');
            $dataPengaduan->deskripsi = $request->input('IsiPengaduan');
            $dataPengaduan->foto_lampiran = $fotoName;

            $kategoriPengaduan = Kategori::find($request->input('KategoriPengaduan'));
            $dataPengaduan->PengaduanKategori()->associate($kategoriPengaduan);

            $dataPengaduan->save();

            return redirect()->route('Pengaduanku')->with('success', 'Laporanmu sudah terkirim, harap sabar untuk mendapatkan tanggapan.');
        }
        return redirect()->back()->with('error', 'Cek data yang anda inputkan dengan benar!');
    }

    public function detailPengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::find($id_pengaduan);
        $tanggapan = Tanggapan::where('pengaduan_id', $id_pengaduan)->get();
        return view('Masyarakat.content.Pengaduan.detail', compact('pengaduan', 'tanggapan'));
    }
}
