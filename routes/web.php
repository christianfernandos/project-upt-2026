<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaFrontController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShowBlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilUptFrontController;
use App\Http\Controllers\ProgramKegiatanFrontController;
use App\Http\Controllers\KalkulatorFrontController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\ProfilUptController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\ProgramKegiatanController;
use App\Http\Controllers\Admin\KalkulatorController;
use App\Http\Controllers\Admin\BeritaController;

// ======== FRONT-END PUBLIC ========
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('profil-upt', [ProfilUptFrontController::class, 'index'])->name('profil-upt');
Route::get('profil-upt/struktur-organisasi', [ProfilUptFrontController::class, 'struktur'])->name('profil.struktur');
Route::get('profil-upt/tugas-dan-fungsi',    [ProfilUptFrontController::class, 'tugas'])->name('profil.tugas');
Route::get('profil-upt/visi-misi',           [ProfilUptFrontController::class, 'visimisi'])->name('profil.visimisi');
Route::get('profil-upt/profil-pegawai',      [ProfilUptFrontController::class, 'pegawai'])->name('profil.pegawai');
Route::get('program-kegiatan', [ProgramKegiatanFrontController::class, 'index'])->name('program-kegiatan');
Route::get('kalkulator-produktivitas', [KalkulatorFrontController::class, 'index'])->name('kalkulator');
Route::get('kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('berita', [BeritaFrontController::class, 'index'])->name('berita');
Route::get('berita/{id}', [BeritaFrontController::class, 'show'])->name('berita.show');
Route::get('show-blog', [ShowBlogController::class, 'index'])->name('show-blog');
Route::get('read-blog/{slug}', [ShowBlogController::class, 'read'])->name('read-blog');

// ======== AUTH ========
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-validate', [LoginController::class, 'login'])->name('login-validate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ======== ADMIN AREA ========
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Blog (existing)
    Route::resource('blog', BlogController::class);

    // Profil UPT (singleton - hanya edit)
    Route::get('admin/profil-upt', [ProfilUptController::class, 'index'])->name('admin.profil-upt.index');
    Route::put('admin/profil-upt', [ProfilUptController::class, 'update'])->name('admin.profil-upt.update');

    // Pegawai (CRUD)
    Route::get('admin/pegawai',             [PegawaiController::class, 'index'])->name('admin.pegawai.index');
    Route::get('admin/pegawai/create',      [PegawaiController::class, 'create'])->name('admin.pegawai.create');
    Route::post('admin/pegawai',            [PegawaiController::class, 'store'])->name('admin.pegawai.store');
    Route::get('admin/pegawai/{id}/edit',   [PegawaiController::class, 'edit'])->name('admin.pegawai.edit');
    Route::put('admin/pegawai/{id}',        [PegawaiController::class, 'update'])->name('admin.pegawai.update');
    Route::delete('admin/pegawai/{id}',     [PegawaiController::class, 'destroy'])->name('admin.pegawai.destroy');

    // Program Kegiatan (CRUD)
    Route::get('admin/program-kegiatan',            [ProgramKegiatanController::class, 'index'])->name('admin.program-kegiatan.index');
    Route::get('admin/program-kegiatan/create',     [ProgramKegiatanController::class, 'create'])->name('admin.program-kegiatan.create');
    Route::post('admin/program-kegiatan',           [ProgramKegiatanController::class, 'store'])->name('admin.program-kegiatan.store');
    Route::get('admin/program-kegiatan/{id}/edit',  [ProgramKegiatanController::class, 'edit'])->name('admin.program-kegiatan.edit');
    Route::put('admin/program-kegiatan/{id}',       [ProgramKegiatanController::class, 'update'])->name('admin.program-kegiatan.update');
    Route::delete('admin/program-kegiatan/{id}',    [ProgramKegiatanController::class, 'destroy'])->name('admin.program-kegiatan.destroy');

    // Kalkulator (CRUD)
    Route::get('admin/kalkulator',            [KalkulatorController::class, 'index'])->name('admin.kalkulator.index');
    Route::get('admin/kalkulator/create',     [KalkulatorController::class, 'create'])->name('admin.kalkulator.create');
    Route::post('admin/kalkulator',           [KalkulatorController::class, 'store'])->name('admin.kalkulator.store');
    Route::get('admin/kalkulator/{id}/edit',  [KalkulatorController::class, 'edit'])->name('admin.kalkulator.edit');
    Route::put('admin/kalkulator/{id}',       [KalkulatorController::class, 'update'])->name('admin.kalkulator.update');
    Route::delete('admin/kalkulator/{id}',    [KalkulatorController::class, 'destroy'])->name('admin.kalkulator.destroy');

    // Berita (CRUD)
    Route::get('admin/berita',            [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('admin/berita/create',     [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('admin/berita',           [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/{id}/edit',  [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/{id}',       [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('admin/berita/{id}',    [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});



