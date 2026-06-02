<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Gambar - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen font-sans">

    <nav class="bg-white shadow-sm border-b py-4 px-8 flex justify-between items-center sticky top-0 z-50">
        <h1 class="font-bold text-[#c26d88]">Admin Desa Bogoran</h1>
        <a href="{{ route('admin.home') }}" class="text-sm text-gray-500 hover:text-black">Kembali ke Dashboard</a>
    </nav>

    <div class="container mx-auto p-6 max-w-6xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Gambar</h2>
            <a href="{{ route('admin.galeri.create') }}"
                class="bg-[#17bb56] text-white px-5 py-2 rounded-lg font-bold shadow-md hover:bg-[#129143] transition">
                + Tambah Gambar
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="p-4 text-sm font-bold text-gray-600">Gambar</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Judul / Caption</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Status</th>
                        <th class="p-4 text-sm font-bold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($galeris as $galleri)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <img src="{{ asset($galleri->gambar) }}"
                                class="w-24 h-16 object-cover rounded-md shadow-sm border border-gray-200">
                        </td>
                        <td class="p-4 font-semibold text-gray-800">{{ $galleri->judul }}</td>
                        <td class="p-4">
                            @if($galleri->status == 'Publish')
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded">✅
                                PUBLISH</span>
                            @else
                            <span class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-1 rounded">📂
                                DRAFT</span>
                            @endif
                        </td>
                        <td class="p-4 flex justify-center gap-3 mt-4">
                            <a href="{{ route('admin.galeri.edit', $galleri->id) }}"
                                class="bg-blue-100 text-blue-600 px-3 py-1.5 rounded text-xs font-bold hover:bg-blue-200 transition">Edit</a>

                            <form action="{{ route('admin.galeri.destroy', $galleri->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="bg-red-100 text-red-600 px-3 py-1.5 rounded text-xs font-bold hover:bg-red-200 transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-gray-400">Belum ada gambar di galeri. Silakan
                            tambah gambar pertama!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>