<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Anggota - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border mt-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">{{ isset($anggota) ? 'Edit Anggota' : 'Tambah Anggota Baru' }}
        </h2>

        <form
            action="{{ isset($anggota) ? route('admin.anggota.update', $anggota->id) : route('admin.anggota.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($anggota)) @method('PUT') @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $anggota->nama ?? '') }}" required
                        class="w-full border p-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $anggota->jabatan ?? '') }}"
                        placeholder="Contoh: Kepala Desa" required
                        class="w-full border p-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi / Bio Singkat (Opsional)</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full border p-3 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $anggota->deskripsi ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Foto Profil</label>
                @if(isset($anggota)) <img src="{{ asset($anggota->gambar) }}"
                    class="h-24 w-24 object-cover rounded-full mb-3 border"> @endif
                <input type="file" name="gambar" {{ isset($anggota) ? '' : 'required' }} accept="image/*"
                    class="w-full border p-2 rounded-lg bg-gray-50">
            </div>

            <div class="pt-4 flex gap-3">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-bold shadow-md">Simpan
                    Data</button>
                <a href="{{ route('admin.anggota.index') }}"
                    class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg font-bold hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>