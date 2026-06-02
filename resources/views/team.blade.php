@extends('layouts.app')

@section('title', 'Perangkat Desa Bogoran')

@section('content')
<div class="w-full max-w-6xl mx-auto px-4 py-12">

    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-2 text-white">Struktur <span class="text-[#88c26d]">Organisasi</span></h2>
        <p class="text-gray-300">Mengenal lebih dekat para pelayan masyarakat Desa Bogoran.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($anggotas as $anggota)

        <div
            class="group bg-white rounded-3xl border border-gray-200 shadow-xl p-6 text-center hover:shadow-2xl hover:border-black transition-all duration-300 transform hover:-translate-y-2">

            <div class="relative mb-6 inline-block">
                @if(stripos($anggota->jabatan, 'Kepala Desa') !== false)
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-black mx-auto shadow-md">
                    <img src="{{ asset($anggota->gambar) }}" alt="{{ $anggota->nama }}"
                        class="w-full h-full object-cover bg-white">
                </div>
                <div class="absolute -bottom-2 right-0 left-0">
                    <span
                        class="bg-black text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase shadow-lg tracking-wider">Pimpinan</span>
                </div>
                @else
                <div
                    class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-800 mx-auto group-hover:border-black transition shadow-sm">
                    <img src="{{ asset($anggota->gambar) }}" alt="{{ $anggota->nama }}"
                        class="w-full h-full object-cover bg-white">
                </div>
                @endif
            </div>

            <h3 class="text-xl font-black text-black mb-1">{{ $anggota->nama }}</h3>
            <p class="text-gray-800 text-sm font-bold mb-4 uppercase">{{ $anggota->jabatan }}</p>

            @if($anggota->deskripsi)
            <p class="text-xs text-gray-600 italic">"{{ $anggota->deskripsi }}"</p>
            @endif

        </div>

        @empty
        <div
            class="col-span-full text-center py-12 bg-white/90 backdrop-blur-md rounded-2xl border border-gray-200 shadow-lg">
            <p class="text-gray-600 font-medium italic">Belum ada data perangkat desa yang ditambahkan oleh Admin.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-24 text-center w-full">
        <h3 class="text-3xl font-bold text-white mb-8 drop-shadow-md">Bagan Struktur Pemerintahan Desa</h3>

        <div
            class="bg-black/50 backdrop-blur-md p-4 sm:p-8 rounded-4xl border border-white/20 shadow-2xl overflow-hidden group">
            <img src="{{ asset('assets/struktur-organisasi.jpeg') }}" alt="Bagan Struktur Organisasi Desa Bogoran"
                class="w-full h-auto object-contain rounded-xl group-hover:scale-[1.02] transition-transform duration-500">
        </div>
    </div>

    <div class="mt-20 p-8 bg-white/95 backdrop-blur-sm rounded-3xl border border-gray-200 shadow-xl">
        <p class="text-sm text-gray-800 font-medium text-center leading-relaxed">
            Seluruh jajaran perangkat <span class="font-bold">Desa Bogoran</span> berkomitmen untuk memberikan pelayanan
            terbaik bagi warga. Jika Anda
            memiliki kebutuhan administratif, silakan kunjungi kantor desa pada jam kerja (08.00 - 15.00 WIB).
        </p>
    </div>

</div>
@endsection