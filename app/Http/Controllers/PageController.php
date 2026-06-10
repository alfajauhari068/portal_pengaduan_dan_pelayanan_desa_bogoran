<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Anggota;
use Illuminate\View\View;

/**
 * PageController
 * 
 * Controller untuk menangani halaman-halaman publik (static dan semi-dynamic pages)
 * Refactoring dari closure routes untuk meningkatkan maintainability dan testability
 */
class PageController extends Controller
{
    /**
     * Menampilkan halaman beranda/welcome
     */
    public function home(): View
    {
        return view('welcome');
    }

    /**
     * Menampilkan halaman tentang desa
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Menampilkan halaman blog dengan daftar berita yang sudah dipublikasikan
     */
    public function blog(): View
    {
        $beritas = Berita::where('status', 'Publish')
            ->latest()
            ->get();
        
        return view('blog', compact('beritas'));
    }

    /**
     * Menampilkan halaman tim/anggota desa
     */
    public function team(): View
    {
        $anggotas = Anggota::all();
        
        return view('team', compact('anggotas'));
    }

    /**
     * Menampilkan halaman galeri foto
     */
    public function galeri(): View
    {
        $galeris = Galeri::latest()->get();
        
        return view('galeri', compact('galeris'));
    }

    /**
     * Menampilkan formulir pengaduan
     */
    public function pengaduan(): View
    {
        return view('pengaduan');
    }
}
