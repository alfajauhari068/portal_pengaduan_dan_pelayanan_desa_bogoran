@extends('layouts.app')

@section('title', 'Layanan Pengaduan')

@section('content')
<div class="w-full max-w-2xl mx-auto bg-white p-8 rounded-2xl border border-gray-200 shadow-2xl my-10 text-left">

    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold mb-2 text-gray-900">Form <span class="text-[#3cbe47]">Pengaduan</span></h2>
        <p class="text-sm text-gray-600">Silakan sampaikan keluhan atau aspirasi Anda untuk kemajuan Desa Bogoran.</p>
    </div>

    {{-- Alert Jika Sukses --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-500 text-green-800 p-4 rounded-lg mb-6 text-center font-medium">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form action --}}
    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-bold mb-1 ml-1 text-gray-800">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama" required
                    class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#3cbe47] transition text-gray-900 placeholder-gray-400">
            </div>

            <div>
                <label class="block text-sm font-bold mb-1 ml-1 text-gray-800">NIK (Sesuai KTP)</label>
                <input type="number" name="nik" placeholder="16 digit nomor induk" required
                    class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#3cbe47] transition text-gray-900 placeholder-gray-400">
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5">
            <div>
                <label class="block text-sm font-bold mb-1 ml-1 text-gray-800">Nomor WhatsApp Aktif</label>
                <input type="number" name="no_wa" placeholder="Contoh: 6281234567890 (Gunakan awalan 62)" required
                    class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#3cbe47] transition text-gray-900 placeholder-gray-400">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold mb-1 ml-1 text-gray-800">Kategori Pengaduan</label>
            <select name="kategori" required
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#3cbe47] transition cursor-pointer text-gray-900">
                <option value="Infrastruktur (Jalan/Jembatan)">Infrastruktur (Jalan/Jembatan)</option>
                <option value="Keamanan & Ketertiban">Keamanan & Ketertiban</option>
                <option value="Layanan Administrasi">Layanan Administrasi</option>
                <option value="Bantuan Sosial">Bantuan Sosial</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold mb-2 ml-1 text-gray-800">Lampiran Foto (Opsional)</label>
            <input type="file" name="foto" accept="image/*"
                class="text-sm text-gray-700 w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer">
        </div>

        <div>
            <label class="block text-sm font-bold mb-1 ml-1 text-gray-800">Detail Laporan</label>
            <textarea name="pesan" rows="4" placeholder="Jelaskan secara detail masalah yang Anda temui..." required
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#3cbe47] transition text-gray-900 placeholder-gray-400"></textarea>
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full bg-[#3cbe47] hover:bg-green-600 text-white font-bold py-3.5 rounded-xl transition duration-300 shadow-lg transform hover:-translate-y-1">
                Kirim Laporan ke Desa
            </button>
        </div>
    </form>
</div>
@endsection