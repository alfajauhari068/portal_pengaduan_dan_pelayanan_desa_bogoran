<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str; 

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        // DIUBAH: Menuju ke resources/views/admin/berita.blade.php
        return view('admin.berita', compact('beritas'));
    }

    public function create()
    {
        // DIUBAH: Jika form tambah juga ada di file yang sama atau file khusus
        // Jika kamu pakai file yang sama, arahkan ke admin.berita
        return view('admin.berita.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('berita_fotos'), $nama_file);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul), 
            'kategori' => $request->kategori,
            'status' => $request->status,
            'konten' => $request->konten,
            'gambar' => 'berita_fotos/' . $nama_file,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        // DIUBAH: Menuju folder form (pastikan file form.blade.php ada di views/admin/berita/form.blade.php)
        return view('admin.berita.form', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048|nullable'
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'status' => $request->status,
            'konten' => $request->konten,
        ];

        if ($request->hasFile('gambar')) {
            if (File::exists(public_path($berita->gambar))) {
                File::delete(public_path($berita->gambar));
            }
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('berita_fotos'), $nama_file);
            $data['gambar'] = 'berita_fotos/' . $nama_file;
        }

        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if (File::exists(public_path($berita->gambar))) {
            File::delete(public_path($berita->gambar));
        }
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus!');
    }
}