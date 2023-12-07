<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/tentang-kami', [UserController::class, 'about'])->name('about');
Route::fallback(FallbackController::class);
// Route::get('/kontak-kami', [UserController::class, 'contact'])->name('contact');

Route::middleware(['AuthCheck'])->group(function() {
    Route::get('auth/google/callback/', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
    Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/login', [AuthController::class, 'PageLogin'])->name('login');
    Route::post('/login-post', [AuthController::class, 'postLogin'])->name('login-post');
    Route::get('/register', [AuthController::class, 'PageRegister'])->name('register');
    Route::post('/register-post', [AuthController::class, 'postRegis'])->name('register-post');
});

Route::middleware(['checkRole','web'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::post('/update-status/{id_pengaduan}', [AdminController::class, 'updateStatus'])->name('Update.Status');
    Route::get('/detail-laporan/{id_pengaduan}', [AdminController::class, 'detailLaporan'])->name('Detail.Laporan');
    Route::get('/data-masyarakat', [AdminController::class, 'dataMasyarakat'])->name('Data.Masyarakat');
    Route::view('/add-masyarakat', 'Admin.layout.content.DataMasyarakat.add-masyarakat')->name('Add.Masyarakat');
    Route::post('/post-masyarakat', [AdminController::class, 'simpanMasyarakat'])->name('Post.Masyarakat');
    Route::get('/edit-data-masyarakat/{id_users}', [AdminController::class, 'showDataMasyarakat'])->name('Show.EditMasyarakat');
    Route::post('/update-data-masyarakat/{id_users}', [AdminController::class, 'editMasyarakat'])->name('Update.Masyarakat');
    Route::get('/data-pegawai', [AdminController::class, 'dataPegawai'])->name('Data.Pegawai');
    Route::view('/add-pegawai', 'Admin.layout.content.DataPegawai.add-pegawai')->name('Add.Pegawai');
    Route::post('/post-pegawai', [AdminController::class, 'simpanPegawai'])->name('Post.Pegawai');
    Route::get('/edit-data-pegawai/{id_users}', [AdminController::class, 'showDataPegawai'])->name('Show.EditPegawai');
    Route::post('/update-data-pegawai/{id_users}', [AdminController::class, 'editPegawai'])->name('Update.Pegawai');
    Route::get('/kategori-pengaduan', [AdminController::class, 'KategoriPengaduan'])->name('Kategori.Pengaduan');
    Route::view('/add-kategori', 'Admin.layout.content.KategoriPage.add-kategori')->name('Add.Kategori');
    Route::post('/post-kategori', [AdminController::class, 'simpanKategori'])->name('Post.Kategori');
    Route::get('/edit-kategori-pengaduan/{id_kategori}', [AdminController::class, 'editKategori'])->name('Show.EditKategori');
    Route::post('/update-kategori-pengaduan/{id_kategori}', [AdminController::class, 'updateKategori'])->name('Update.Kategori');
    Route::get('/laporan-masuk', [AdminController::class, 'laporanMasuk'])->name('Laporan.Masuk');
    Route::get('/generate-laporan', [AdminController::class, 'generatePage'])->name('Generate.Page');
    Route::get('/detail-profile/{id_users}', [AdminController::class, 'detailProfilePage'])->name('Detail.Profile');
    Route::get('/profile-pegawai/{id_users}', [AdminController::class, 'profilePegawai'])->name('Profile.Pegawai');
    Route::get('/change-password-pegawai', [AdminController::class, 'pageChangePass'])->name('Change.Pass');
    Route::post('/update-password-pegawai', [AdminController::class, 'updatePasswordPegawai'])->name('Update.Pass');
    Route::get('/laporan-periode', [AdminController::class, 'CetakLaporanPdf'])->name('Laporan.Periode');
    Route::get('/rekap-laporan', [AdminController::class, 'CetakRekap'])->name('Cetak');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['masyarakat'])->prefix('apm')->group(function () {
    Route::get('/pengaduanku', [UserController::class, 'dashboard'])->name('Pengaduanku');
    Route::get('/form-pengaduan', [PengaduanController::class, 'formPengaduan'])->name('Form.pengaduan');
    Route::post('/kirim-pengaduan', [PengaduanController::class, 'KirimPengaduan'])->name('Kirim.Pengaduan');
    Route::get('/detail-pengaduan/{id_pengaduan}', [PengaduanController::class, 'detailPengaduan'])->name('Detail.Pengaduan')->where('id_pengaduan', '[000-999]+');
    Route::get('/profileku', [UserController::class, 'profileku'])->name('Profile');
    Route::view('/password-change', 'Masyarakat.content.change-password')->name('Password.Change');
    Route::post('/update-password-masyarakat', [UserController::class, 'updatePasswordMasyarakat'])->name('Update.Password.Masyarakat');
});

Route::post('/update-profile/{id_users}', [UserController::class, 'updateProfile'])->name('Update.Profile')->middleware('auth');
Route::post('/post-tanggapan', [TanggapanController::class, 'kirimTanggapan'])->name('Post.Tanggapan')->middleware('auth');
