<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function PageLogin()
    {
        return view('Auth.login');
    }

    public function PageRegister()
    {
        return view('Auth.register');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin-dashboard');
        } elseif ($user->isPetugas()) {
            return redirect()->route('admin-dashboard');
        } else {
            return redirect()->route('Pengaduanku');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        if ($user->exists) {
        Auth::login($user);

        if ($user->hasRole('admin') || $user->hasRole('petugas')) {
        return redirect()->route('admin-dashboard');
        } else {
        return redirect()->route('Pengaduanku');
        }
        } else {
        $user = User::create([
            'foto_profile' => $user->avatar,
            'email_verified_at' => now(),
            'nama_lengkap' => $user->name,
            'email' => $user->email,
            'password' => bcrypt(Str::random(10)),
            'remember_token' => Str::random(10),
            'provider' => 'google',
        ]);
        Auth::login($user);
        return redirect()->route('Pengaduanku');
        }
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('inputEmail'),
            'password' => $request->input('inputPassword'),
        ];
        $remember = $request->has('remember_token');

        if (!$request->filled('inputEmail') || !$request->filled('inputPassword')) {
            return redirect('/login')->with('warning', 'Email dan password harus diisi!');
        }

        if (Auth::attempt($credentials, $remember)) {
            // $user = Auth::user()->role;
            // $request->session()->regenerate();

            $user = Auth::user();
            if ($user->isAdmin() || $user->isPetugas()) {
                return redirect()->intended('/dashboard')->with('success', 'Welcome Back!');
            } else {
                return redirect()->intended('apm/pengaduanku')->with('success', 'Selamat datang di aplikasi pengaduan masyarakat dusun margasari.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout!');
    }

    public function postRegis(Request $request)
    {
        $validateData = $request->validate([
            'inputNik' => 'required|unique:users,NIK|min:16|max:16|regex:/^[0-9]{16}+$/',
            'inputEmail' => 'required|email|unique:users,email',
            'inputNama' => 'required',
            'inputNoTelepon' => 'required|min:11|max:13|regex:/^[0-9]{13}+$/',
            'inputAlamat' => 'required',
            'inputPassword' => 'required|min:8',
            'pilihJenisKelamin' => 'required',
            'foto_profile' => 'required|mimes:jpg,jpeg,svg,png|image|max:2048'
        ], [
            'inputNik.max' => 'Nik harus 16 karakter!',
            'inputNik.min' => 'Nik harus 16 karakter!',
            'inputNik.numeric' => 'Nik harus berupa angka!',
            'inputNik.unique' => 'Nik sudah digunakan',
            'inputEmail.email' => 'Format email salah!',
            'inputEmail.unique' => 'Email sudah digunakan!',
            'inputNoTelepon.max' => 'Nomor telepon maksimal 13 karakter!',
            'inputNoTelepon.numeric' => 'Nomor telepon harus berupa angka!',
            'inputPassword.min' => 'Password minimal 8 karakter!',
            'foto_profile.mimes' => 'Foto harus dalam format (jpg, jpeg, svg, png)!',
            'foto_profile.max' => 'Foto maksimal 2MB!',
        ]);

        $existingUser = User::where('email', $validateData['inputEmail'])->first();

        if (!$existingUser) {
            $hashedPassword = Hash::make($validateData['inputPassword']);

            if ($request->hasFile('foto_profile')) {
                $foto = $request->file('foto_profile');
                $extension = $foto->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $foto->move('foto_profile', $fileName);

                User::create([
                'NIK' => $validateData['inputNik'],
                'jenis_kelamin' => $validateData['pilihJenisKelamin'],
                'no_telp' => $validateData['inputNoTelepon'],
                'alamat' => $validateData['inputAlamat'],
                'nama_lengkap' => $validateData['inputNama'],
                'email' => $validateData['inputEmail'],
                'password' => $hashedPassword,
                'foto_profile' => $fileName,
            ]);

                return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan login!');
            }
        }

        $request->flashOnly('inputNik', 'pilihJenisKelamin', 'inputNoTelepon', 'inputAlamat', 'inputNama', 'inputEmail',
        'inputPassword');
        return redirect()->back()->with('error', 'Akun gagal dibuat, masukkan data yang sesuai!');
    }

}
