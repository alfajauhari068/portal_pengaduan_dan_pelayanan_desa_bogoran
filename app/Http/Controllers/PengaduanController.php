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

    // ====================================================
    // AUTENTIKASI - LOGIN & LOGOUT
    // ====================================================

    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    // ====================================================
    // ADMIN DASHBOARD & MANAGE PENGADUAN
    // ====================================================

    /**
     * Menampilkan halaman utama admin (command center/beranda)
     * Menampilkan statistik pengaduan untuk dashboard overview
     */
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

    /**
     * Proses Login Admin
     * 
     * Method ini menangani autentikasi user dengan mengikuti best practice Laravel:
     * - Validasi input dengan rule yang ketat
     * - Menggunakan Auth::attempt() untuk autentikasi yang aman
     * - Session regeneration untuk mencegah session fixation attack
     * - Redirect ke intended page atau dashboard
     */
    public function loginPost(Request $request)
    {
        // Validasi input dengan rule yang lebih ketat
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        // Attempt autentikasi dengan kredensial yang sudah divalidasi
        // Menggunakan Auth::attempt() adalah cara standard dan aman di Laravel
        if (Auth::attempt($validated, remember: false)) {
            // Regenerate session ID untuk mencegah session fixation attack
            $request->session()->regenerate();
            
            // Redirect ke intended page (halaman yang sebelumnya diminta)
            // atau default ke admin.home jika tidak ada intended page
            return redirect()->intended(route('admin.home'));
        }

        // Jika autentikasi gagal, kembalikan ke form dengan error message
        // Gunakan 'email' sebagai key error untuk menampilkan di form
        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    /**
     * Proses Logout Admin
     * 
     * Best practice logout untuk mencegah session hijacking dan cache issues:
     * - Invalidate session ID dengan invalidate()
     * - Flush semua session data
     * - Regenerate CSRF token
     * - Set no-cache headers untuk mencegah browser cache (terutama mobile)
     * - Delete session cookie explicitly
     */
    public function logout(Request $request)
    {
        // Guard dan logout user
        Auth::guard('web')->logout();
        
        // Invalidate session - menghancurkan session ID saat ini
        $request->session()->invalidate();
        
        // Regenerate CSRF token untuk prevent CSRF attacks
        $request->session()->regenerateToken();
        
        // Flush semua session data - pastikan tidak ada data tertinggal
        $request->session()->flush();
        
        // Return response dengan no-cache headers
        return redirect('/login')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0, private')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Thu, 01 Jan 1970 00:00:00 GMT')
            ->with('message', 'Logout berhasil. Anda telah keluar dari sistem.');
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