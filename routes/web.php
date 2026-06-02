<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;

// TAMBAHAN: Memanggil Controller Berita dan Galeri
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;

// PENTING: Panggil Model Berita agar bisa mengambil data
use App\Models\Berita;
use App\Models\Galeri; //  Model Galeri 

use App\Models\Anggota;// team atau anggota
use App\Http\Controllers\AnggotaController;
// ----------------------------------------------------
// ROUTE HALAMAN PUBLIK (WARGA)
// ----------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


// Mengambil data BERITA untuk ditampilkan di halaman blog
Route::get('/blog', function () {
    $beritas = Berita::where('status', 'Publish')->latest()->get();
    return view('blog', compact('beritas'));
})->name('blog');



Route::get('/team', function () {
    $anggotas = Anggota::all(); // Ambil semua data anggota
    return view('team', compact('anggotas'));
})->name('team');



// Mengambil data GAMBAR untuk ditampilkan di halaman gallery
Route::get('/galeri', function () {
    $galeris = Galeri::latest()->get(); // Mengambil semua foto terbaru
    return view('galeri', compact('galeris'));
})->name('gallery');



// ----------------------------------------------------
// ROUTE PENGADUAN
// ----------------------------------------------------
Route::get('/pengaduan', function () { 
    return view('pengaduan'); 
})->name('pengaduan');

// Route untuk memproses form saat disubmit warga
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// ----------------------------------------------------
// ROUTE ADMIN & DASHBOARD
// ----------------------------------------------------
// Halaman Login
Route::get('/login', function () { 
    return view('admin.login'); 
})->name('login');

// Proses Login dan Logout
Route::post('/login', [PengaduanController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [PengaduanController::class, 'logout'])->name('logout');

// Halaman Dashboard (Dilindungi middleware 'auth', wajib login)
Route::middleware('auth')->group(function () {
    
    // ROUTE BARU: Halaman Utama Admin (Pusat Komando)
    Route::get('/admin/home', [PengaduanController::class, 'home'])->name('admin.home');

    // ROUTE: Manajemen Pengaduan (Kode lamamu tetap aman di sini)
    Route::get('/admin/dashboard', [PengaduanController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/admin/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.status');
    Route::delete('/admin/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    
    // ROUTE BARU: Manajemen Berita (Menghubungkan fitur CRUD)
    Route::resource('/admin/berita', BeritaController::class, ['as' => 'admin']);
    
    // INI TAMBAHAN SAYA: Mengaktifkan jalur untuk Manajemen Galeri
    Route::resource('/admin/galeri', GaleriController::class, ['as' => 'admin']);

    Route::resource('/admin/anggota', AnggotaController::class, ['as' => 'admin']);
});