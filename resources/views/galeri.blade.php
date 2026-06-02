@extends('layouts.app')

@section('title', 'Galeri Desa Bogoran')

@section('content')
<div class="w-full max-w-6xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-2">Galeri <span class="text-[#3bc947]">Desa</span></h2>
        <p class="text-gray-300 italic text-sm md:text-base">Potret Tempat kegiatan, keindahan alam dan hangatnya
            kebersamaan warga Desa Bogoran.
        </p>
    </div>

    <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">

        @forelse($galeris as $g)
        <div class="relative group overflow-hidden rounded-2xl border border-white/10 shadow-xl bg-black/20">
            {{-- Gambar dari Database --}}
            <img src="{{ asset($g->gambar) }}" alt="{{ $g->judul }}"
                class="w-full group-hover:scale-110 transition duration-700 opacity-90">

            {{-- Overlay Caption Otomatis Muncul saat Hover --}}
            <div
                class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                <span class="text-[#41c530] text-[10px] font-bold uppercase tracking-widest mb-1">Dokumentasi
                    Desa</span>
                <h4 class="text-white font-bold text-lg leading-tight">{{ $g->judul }}</h4>
                <p class="text-[10px] text-white/50 mt-2">{{ $g->created_at->format('d M Y') }}</p>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center border border-dashed border-white/20 rounded-2xl">
            <p class="text-gray-500 italic">Belum ada koleksi foto di galeri saat ini.</p>
        </div>
        @endforelse

    </div>

    <div class="mt-16 text-center">
        <p class="text-xs text-white/30 uppercase tracking-[0.3em]">Hak Cipta Fotografi © 2026 Desa Bogoran</p>
    </div>
</div>
@endsection