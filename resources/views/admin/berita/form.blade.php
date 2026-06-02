<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }} - Admin Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen py-10">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">

        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ isset($berita) ? '✏️ Edit Berita Desa' : '📝 Tulis Berita Baru' }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Lengkapi informasi berita di bawah ini dengan benar.</p>
            </div>
            <a href="{{ route('admin.berita.index') }}"
                class="text-gray-400 hover:text-gray-800 transition text-sm font-semibold">
                &larr; Batal & Kembali
            </a>
        </div>

        <form action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf
            @if(isset($berita))
            @method('PUT')
            @endif

            <div>
                <label class="block font-bold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}"
                    placeholder="Contoh: Musyawarah Desa Bogoran Tahun 2026" required
                    class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#c26d88] transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Kategori Berita</label>
                    <select name="kategori" required
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#c26d88] transition bg-white">
                        <option value="Pemerintahan"
                            {{ (old('kategori', $berita->kategori ?? '') == 'Pemerintahan') ? 'selected' : '' }}>🏛️
                            Pemerintahan Desa</option>
                        <option value="Pembangunan"
                            {{ (old('kategori', $berita->kategori ?? '') == 'Pembangunan') ? 'selected' : '' }}>🏗️
                            Pembangunan</option>
                        <option value="Kegiatan Warga"
                            {{ (old('kategori', $berita->kategori ?? '') == 'Kegiatan Warga') ? 'selected' : '' }}>👥
                            Kegiatan Warga</option>
                        <option value="Pengumuman"
                            {{ (old('kategori', $berita->kategori ?? '') == 'Pengumuman') ? 'selected' : '' }}>📢
                            Pengumuman</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Status Publikasi</label>
                    <select name="status" required
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#c26d88] transition bg-white">
                        <option value="Publish"
                            {{ (old('status', $berita->status ?? '') == 'Publish') ? 'selected' : '' }}>✅ Publish
                            (Tayang)</option>
                        <option value="Draft" {{ (old('status', $berita->status ?? '') == 'Draft') ? 'selected' : '' }}>
                            📂 Draft (Simpan Saja)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-2">Isi Berita</label>
                <textarea name="konten" rows="10" required placeholder="Tuliskan detail berita di sini..."
                    class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#c26d88] transition leading-relaxed">{{ old('konten', $berita->konten ?? '') }}</textarea>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-2">Foto Utama / Thumbnail</label>

                @if(isset($berita) && $berita->gambar)
                <div class="mb-4">
                    <p class="text-xs text-gray-400 mb-2 italic">Foto saat ini:</p>
                    <img src="{{ asset($berita->gambar) }}" alt="Preview" class="h-40 rounded-lg shadow-sm border">
                </div>
                @endif

                <div
                    class="relative border-2 border-dashed border-gray-300 p-6 rounded-xl text-center hover:border-[#c26d88] transition bg-gray-50">
                    <input id="gambarInput" type="file" name="gambar" {{ isset($berita) ? '' : 'required' }} accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="text-gray-500">
                        <p class="font-semibold">Klik atau seret gambar ke sini</p>
                        <p class="text-xs mt-1">Format: JPG, JPEG, PNG (Max 2MB)</p>
                        <p id="gambarStatus" class="text-[11px] mt-3 text-green-700 font-semibold hidden">Gambar sudah dipilih.</p>
                    </div>
                </div>
                @if(isset($berita))
                <p class="text-[10px] text-amber-600 mt-2 font-medium">*Kosongkan jika tidak ingin mengganti foto utama.
                </p>
                @endif
            </div>

            <div class="pt-6">
                <button type="submit"
                    class="w-full md:w-auto bg-[#c26d88] hover:bg-[#a85973] text-white px-10 py-3 rounded-xl font-bold shadow-lg transition transform active:scale-95">
                    {{ isset($berita) ? 'Update Berita' : 'Terbitkan Berita' }}
                </button>
            </div>

        </form>
    </div>

    <script>
        const gambarInput = document.getElementById('gambarInput');
        const gambarStatus = document.getElementById('gambarStatus');

        if (gambarInput && gambarStatus) {
            gambarInput.addEventListener('change', function () {
                if (this.files && this.files.length > 0) {
                    gambarStatus.textContent = 'Gambar "' + this.files[0].name + '" telah dipilih.';
                    gambarStatus.classList.remove('hidden');
                } else {
                    gambarStatus.textContent = 'Belum ada gambar dipilih.';
                    gambarStatus.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>