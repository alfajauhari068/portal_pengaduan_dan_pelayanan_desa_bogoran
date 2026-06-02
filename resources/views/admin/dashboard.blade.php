<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-100 min-h-screen text-gray-800">
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="font-bold text-xl text-[#6dc274]">Dashboard Pengaduan Desa</h1>
        <a href="{{ url('/admin/home') }}"
            class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded text-sm font-bold transition">
            Kembali ke Portal Admin
        </a>
    </nav>

    <div class="container mx-auto p-6 mt-6">

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-max">
                <thead>
                    <tr class="bg-gray-800 text-white text-sm">
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Nama / Identitas</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Isi Laporan</th>
                        <th class="p-4">Foto</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 text-sm text-gray-500">{{ $p->created_at->format('d M Y') }}</td>

                        <td class="p-4">
                            <p class="font-bold">{{ $p->nama }}</p>
                            <p class="text-xs text-gray-500">NIK: {{ $p->nik }}</p>
                            <p class="text-xs text-green-600 font-bold">WA: +{{ $p->no_wa }}</p>
                        </td>

                        <td class="p-4"><span
                                class="bg-[#c26d88]/10 text-[#6dc28e] px-3 py-1 rounded-full text-xs font-bold">{{ $p->kategori }}</span>
                        </td>
                        <td class="p-4 text-sm max-w-xs">{{ $p->pesan }}</td>
                        <td class="p-4">
                            @if($p->foto)
                            <a href="{{ asset($p->foto) }}" target="_blank"
                                class="text-blue-500 text-xs hover:underline">Lihat Foto</a>
                            @else
                            <span class="text-gray-400 text-xs">Tidak ada</span>
                            @endif
                        </td>

                        <td class="p-4">
                            <form action="{{ route('pengaduan.status', $p->id) }}" method="POST"
                                class="flex flex-col gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status"
                                    onchange="this.form.submit()"
                                    class="text-xs border border-gray-300 rounded p-1.5 focus:outline-none focus:border-[#70c26d]">

                                    <option value="Diproses" {{ $p->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                    </option>
                                    <option value="Selesai" {{ $p->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </form>
                        </td>



                        <td class="p-4">
                            <div class="flex gap-2">
                                @php
                                $isiBalasan = "Laporan Anda sedang kami proses. Kami akan segera menghubungi Anda untuk
                                informasi lebih lanjut.";

                                $pesanWa =
                                "Halo Bapak/Ibu *" . $p->nama . "*.%0A%0A" .

                                "Terima kasih telah menyampaikan pengaduan melalui Website Desa Bogoran.%0A%0A" .

                                "Berikut detail pengaduan Anda:%0A" .
                                "• Tanggal: " . $p->created_at->format('d M Y') . "%0A" .
                                "• Kategori: *" . $p->kategori . "*%0A%0A" .

                                "Pesan dari Admin Desa Bogoran:%0A" .
                                $isiBalasan . "%0A%0A" .

                                "Demikian informasi yang dapat kami sampaikan. Terima kasih atas partisipasi Anda dalam
                                membantu pelayanan dan pembangunan Desa Bogoran.%0A%0A" .

                                "Hormat kami,%0A" .
                                "*Admin Desa Bogoran*";
                                @endphp
                                <a href="https://wa.me/{{ $p->no_wa }}?text={{ $pesanWa }}" target="_blank"
                                    class="bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-1.5 px-3 rounded transition shadow flex items-center">
                                    Balas WA
                                </a>

                                <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus laporan dari {{ $p->nama }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white text-xs font-bold py-1.5 px-3 rounded transition shadow h-full">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">Belum ada laporan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>