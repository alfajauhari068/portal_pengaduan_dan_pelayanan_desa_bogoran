<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaduanController extends Controller
{
    // Menyimpan data dari form warga
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_wa' => 'required',
            'kategori' => 'required',
            'pesan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048|nullable'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('pengaduan_fotos'), $nama_file);
            $data['foto'] = 'pengaduan_fotos/' . $nama_file;
        }

        Pengaduan::create($data);

        return back()->with('success', 'Laporan berhasil dikirim ke Admin Desa!');
    }

    // ----------------------------------------------------
    // PERUBAHAN: FUNGSI BARU UNTUK BERANDA ADMIN
    // ----------------------------------------------------
    public function home()
    {
        // Menghitung jumlah laporan masuk untuk ditampilkan di Beranda
        $totalPengaduan = Pengaduan::count();
        $pengaduanBaru = Pengaduan::where('status', 'Menunggu')->count();
        
        return view('admin.home', compact('totalPengaduan', 'pengaduanBaru'));
    }

    // Menampilkan Tabel Pengaduan Admin
    public function dashboard()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('admin.dashboard', compact('pengaduans'));
    }

    // Proses Login Admin
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
        } catch (\RuntimeException $e) {
            if ($user && $user->password === $credentials['password']) {
                $user->password = Hash::make($credentials['password']);
                $user->save();

                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
        }

        return back()->withErrors(['login' => 'Email atau password salah!'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Fungsi untuk Update Status
    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status' => $request->status]);
        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    // Fungsi untuk Menghapus Laporan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        if ($pengaduan->foto && file_exists(public_path($pengaduan->foto))) {
            unlink(public_path($pengaduan->foto));
        }
        
        $pengaduan->delete();
        return back()->with('success', 'Laporan berhasil dihapus!');
    }
}