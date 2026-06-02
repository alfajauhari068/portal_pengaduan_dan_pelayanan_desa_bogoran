<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Perangkat Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen font-sans">
    <nav class="bg-white shadow-sm border-b py-4 px-8 flex justify-between items-center">
        <h1 class="font-bold text-[#c26d88]">Admin Desa Bogoran</h1>
        <a href="{{ route('admin.home') }}" class="text-sm text-gray-500 hover:text-black">Kembali ke Dashboard</a>
    </nav>

    <div class="container mx-auto p-6 max-w-6xl mt-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Perangkat Desa</h2>
            <a href="{{ route('admin.anggota.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg font-bold shadow-md hover:bg-blue-700 transition">+
                Tambah Anggota</a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="p-4 text-sm font-bold text-gray-600">Foto</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Nama Lengkap</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Jabatan</th>
                        <th class="p-4 text-sm font-bold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($anggotas as $a)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4"><img src="{{ asset($a->gambar) }}"
                                class="w-16 h-16 object-cover rounded-full shadow-sm border"></td>
                        <td class="p-4 font-semibold text-gray-800">{{ $a->nama }}</td>
                        <td class="p-4"><span
                                class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">{{ $a->jabatan }}</span>
                        </td>
                        <td class="p-4 flex justify-center gap-2 mt-2">
                            <a href="{{ route('admin.anggota.edit', $a->id) }}"
                                class="bg-amber-100 text-amber-600 px-3 py-1.5 rounded text-xs font-bold hover:bg-amber-200">Edit</a>
                            <form action="{{ route('admin.anggota.destroy', $a->id) }}" method="POST"
                                onsubmit="return confirm('Hapus anggota ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="bg-red-100 text-red-600 px-3 py-1.5 rounded text-xs font-bold hover:bg-red-200">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-400">Belum ada data perangkat desa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>