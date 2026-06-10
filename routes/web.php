<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AnggotaController;

// ====================================================
// ROUTE HALAMAN PUBLIK (WARGA)
// ====================================================
// Semua halaman publik ditangani oleh PageController
// untuk meningkatkan maintainability dan testability

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/galeri', [PageController::class, 'galeri'])->name('gallery');
Route::get('/pengaduan', [PageController::class, 'pengaduan'])->name('pengaduan');

// ====================================================
// ROUTE PENGADUAN (SUBMIT FORM DARI WARGA)
// ====================================================

Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// ====================================================
// ROUTE AUTENTIKASI (LOGIN & LOGOUT)
// ====================================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [PengaduanController::class, 'showLogin'])->name('login');
    Route::post('/login', [PengaduanController::class, 'loginPost'])->name('login.post');
});

Route::post('/logout', [PengaduanController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ====================================================
// ROUTE ADMIN & DASHBOARD (DILINDUNGI MIDDLEWARE AUTH)
// ====================================================
// Semua route admin memerlukan autentikasi user
// Middleware 'auth' akan automatically redirect ke login jika user belum terautentikasi

Route::middleware('auth')->group(function () {
    
    // ROUTE BERANDA ADMIN (Admin Home / Command Center)
    Route::get('/admin/home', [PengaduanController::class, 'home'])->name('admin.home');

    // ROUTE MANAJEMEN PENGADUAN
    Route::get('/admin/dashboard', [PengaduanController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/admin/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.status');
    Route::delete('/admin/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    
    // ROUTE MANAJEMEN BERITA
    Route::resource('/admin/berita', BeritaController::class, ['as' => 'admin']);
    
    // ROUTE MANAJEMEN GALERI
    Route::resource('/admin/galeri', GaleriController::class, ['as' => 'admin']);

    // ROUTE MANAJEMEN ANGGOTA/TEAM
    Route::resource('/admin/anggota', AnggotaController::class, ['as' => 'admin']);
});