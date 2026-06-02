<?php

namespace App\Http\Controllers;

use App\Models\Galeri; // Menggunakan model Galeri
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        // Menuju ke resources/views/admin/galeri/index.blade.php
return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        // Menuju ke resources/views/admin/galeri/form.blade.php
        return view('admin.galeri.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072'
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('galeri_fotos'), $nama_file);

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => 'galeri_fotos/' . $nama_file,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.form', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,webp|max:3072|nullable'
        ]);

        $data = [
            'judul' => $request->judul,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada foto baru
            if (File::exists(public_path($galeri->gambar))) {
                File::delete(public_path($galeri->gambar));
            }
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('galeri_fotos'), $nama_file);
            $data['gambar'] = 'galeri_fotos/' . $nama_file;
        }

        $galeri->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        // Hapus file fisik foto dari folder public
        if (File::exists(public_path($galeri->gambar))) {
            File::delete(public_path($galeri->gambar));
        }
        $galeri->delete();
        return back()->with('success', 'Foto berhasil dihapus!');
    }
}