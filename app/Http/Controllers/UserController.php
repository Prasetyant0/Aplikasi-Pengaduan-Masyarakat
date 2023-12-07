<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::count();
        $masyarakat = User::count();
        $kategori = Kategori::count();
        return view('index', compact('pengaduan', 'masyarakat', 'kategori'));
    }

    public function profileku()
    {
        $profile = Auth::user();
        return view('Masyarakat.content.profile', compact('profile'));
    }

    public function updateProfile($id_users, Request $request)
    {
        $user = User::find($id_users);
        $isChanged = false;
        if ($request->hasFile('inputFoto')) {
            if ($user->foto_profile) {
               $fotoPath = public_path('foto_profile/' . $user->foto_profile);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
                }
            }
            $foto = $request->file('inputFoto');
            $fotoName = 'Profile' . Carbon::now()->format('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_profile/'), $fotoName);
            $user->foto_profile = $fotoName;
            $isChanged = true;
        }
        if ($user->nama_lengkap != $request->inputNama) {
            $user->nama_lengkap = $request->inputNama;
            $isChanged = true;
        }
        if ($user->NIK != $request->inputNIK) {
            $user->NIK = $request->inputNIK;
            $isChanged = true;
        }
        if ($user->jenis_kelamin != $request->selectJenisKelamin) {
            $user->jenis_kelamin = $request->selectJenisKelamin;
            $isChanged = true;
        }
        if ($user->alamat != $request->inputAlamat) {
            $user->alamat = $request->inputAlamat;
            $isChanged = true;
        }
        if ($user->no_telp != $request->inputNoTelepon) {
            $user->no_telp = $request->inputNoTelepon;
            $isChanged = true;
        }
        if ($user->email != $request->inputEmail) {
            $user->email = $request->inputEmail;
            $isChanged = true;
        }
        if (!$isChanged) {
            return redirect()->back()->with('info', 'Tidak ada perubahan data.');
        }

        $user->save();
        return redirect()->back()->with('success', 'Profile berhasil diupdate.');
    }

    public function updatePasswordMasyarakat(Request $request)
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

            return redirect()->route('Profile', Auth::id())->with('success', 'Password berhasil di ubah.');
        } else {
            return redirect()->back()->with('error', 'Password lama salah!');
        }
    }

    public function dashboard()
    {
        $pengaduanku = Pengaduan::where('users_id', Auth::id())->get();
        return view('Masyarakat.dashboard', compact('pengaduanku'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
