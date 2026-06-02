@extends('layouts.app')

@section('title', 'Kabar Desa Bogoran')

@section('content')
<div class="w-full max-w-6xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-2 text-white">Kabar <span class="text-[#37b637]">Bogoran</span></h2>
        <p class="text-gray-300">Informasi terbaru seputar kegiatan dan perkembangan desa.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">

        @forelse($beritas as $b)
        <div
            class="group bg-white rounded-2xl border border-gray-200 shadow-xl overflow-hidden hover:shadow-2xl hover:border-[#37b637]/50 transition-all duration-300 transform flex flex-col">

            <div class="h-48 bg-gray-100 relative overflow-hidden">
                <img src="{{ asset($b->gambar) }}" alt="{{ $b->judul }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <span
                    class="absolute top-4 left-4 bg-[#27c456] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase shadow-sm">
                    {{ $b->kategori }}
                </span>
            </div>

            <div class="p-6 flex-1 flex flex-col">
                <span class="text-xs text-black font-medium">{{ $b->created_at->format('d M Y') }}</span>

                <h3 class="text-xl text-black font-bold my-2 group-hover:text-[#27c456] transition line-clamp-2">
                    {{ $b->judul }}
                </h3>

                {{-- Teks Berita (ID unik menggunakan $b->id) --}}
                <p id="konten-{{ $b->id }}"
                    class="text-sm text-gray-800 mb-6 line-clamp-3 leading-relaxed transition-all duration-300 text-justify whitespace-pre-line">
                    {{ $b->konten }}
                </p>

                {{-- Tombol (Memanggil ID unik menggunakan $b->id) --}}
                <div class="mt-auto">
                    <button type="button" onclick="bukaTeks('{{ $b->id }}')"
                        class="text-[#27c456] text-sm font-bold flex items-center gap-1 hover:text-green-700 transition duration-300 focus:outline-none">
                        <span id="text-btn-{{ $b->id }}">Baca Selengkapnya</span>
                        <svg id="icon-btn-{{ $b->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div
            class="col-span-3 text-center py-20 bg-white/10 backdrop-blur-md rounded-2xl border border-dashed border-white/30">
            <p class="text-gray-300 italic">Belum ada berita yang diterbitkan untuk saat ini.</p>
        </div>
        @endforelse

    </div>
</div>

<script>
function bukaTeks(id) {
    let konten = document.getElementById('konten-' + id);
    let textBtn = document.getElementById('text-btn-' + id);
    let iconBtn = document.getElementById('icon-btn-' + id);

    if (konten.classList.contains('line-clamp-3')) {
        // Buka Teks
        konten.classList.remove('line-clamp-3');
        textBtn.innerText = 'Tutup Tulisan';
        iconBtn.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
    } else {
        // Tutup Teks
        konten.classList.add('line-clamp-3');
        textBtn.innerText = 'Baca Selengkapnya';
        iconBtn.innerHTML =
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />';
    }
}
</script>
@endsection