<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Galeri - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-100 mt-10">

        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ isset($galeri) ? '✏️ Edit Foto Galeri' : '🖼️ Tambah Foto Baru' }}
            </h2>
            <a href="{{ route('admin.galeri.index') }}"
                class="text-sm font-semibold text-gray-500 hover:text-gray-800">&larr; Kembali</a>
        </div>

        <form action="{{ isset($galeri) ? route('admin.galeri.update', $galeri->id) : route('admin.galeri.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($galeri)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Judul / Caption Foto</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}"
                    placeholder="Contoh: Gotong Royong Warga..." required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-[#17bb56] outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Status Penayangan</label>
                <select name="status" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-[#17bb56] outline-none bg-white">
                    <option value="Publish" {{ (isset($galeri) && $galeri->status == 'Publish') ? 'selected' : '' }}>✅
                        Publish (Tampilkan ke Warga)</option>
                    <option value="Draft" {{ (isset($galeri) && $galeri->status == 'Draft') ? 'selected' : '' }}>📂
                        Draft (Sembunyikan Dulu)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Pilih File Foto</label>
                @if(isset($galeri))
                <div class="mb-3">
                    <p class="text-xs text-gray-500 mb-1">Foto saat ini:</p>
                    <img src="{{ asset($galeri->gambar) }}" class="h-32 object-cover rounded-lg border shadow-sm">
                </div>
                @endif
                <input type="file" name="gambar" {{ isset($galeri) ? '' : 'required' }} accept="image/*"
                    class="w-full border border-gray-300 p-2 rounded-lg bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#17bb56] file:text-white hover:file:bg-[#129143] cursor-pointer">
                @if(isset($galeri))
                <p class="text-xs text-amber-600 mt-2">*Biarkan kosong jika tidak ingin mengganti foto lama.</p>
                @endif
            </div>

            <div class="pt-4 border-t border-gray-100 flex gap-3">
                <button type="submit"
                    class="bg-[#17bb56] hover:bg-[#129143] transition text-white px-8 py-2.5 rounded-lg font-bold shadow-md">
                    💾 Simpan Foto
                </button>
            </div>
        </form>
    </div>
</body>

</html>