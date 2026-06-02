<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Berita - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen font-sans">

    <nav class="bg-white shadow-sm border-b py-4 px-8 flex justify-between items-center sticky top-0 z-50">
        <h1 class="font-bold text-[#6dc278]">Admin Desa Bogoran</h1>
        <a href="{{ route('admin.home') }}" class="text-sm text-gray-500 hover:text-black">Kembali ke Dashboard</a>
    </nav>

    <div class="container mx-auto p-6 max-w-6xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Berita</h2>
            <a href="{{ route('admin.berita.create') }}"
                class="bg-[#7bc26d] text-white px-5 py-2 rounded-lg font-bold shadow-md hover:bg-[#59a873] transition">
                + Tulis Berita
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
                        <th class="p-4 text-sm font-bold text-gray-600">Judul</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Kategori</th>
                        <th class="p-4 text-sm font-bold text-gray-600">Status</th>
                        <th class="p-4 text-sm font-bold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($beritas as $berita)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <img src="{{ asset($berita->gambar) }}" class="w-20 h-14 object-cover rounded-md shadow-sm">
                        </td>
                        <td class="p-4 font-semibold text-gray-800">{{ $berita->judul }}</td>
                        <td class="p-4">
                            <span class="bg-blue-100 text-blue-700 text-[10px] uppercase font-bold px-2 py-1 rounded">
                                {{ $berita->kategori }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if($berita->status == 'Publish')
                            <span
                                class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded">PUBLISH</span>
                            @else
                            <span
                                class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-1 rounded">DRAFT</span>
                            @endif
                        </td>
                        <td class="p-4 flex justify-center gap-2">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                class="text-blue-500 hover:underline font-bold text-sm">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:underline font-bold text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-10 text-center text-gray-400">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>