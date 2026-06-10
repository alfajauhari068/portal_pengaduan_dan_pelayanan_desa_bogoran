<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="Thu, 01 Jan 1970 00:00:00 GMT">
    <title>Beranda Admin - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen text-gray-800 font-sans antialiased">

    <nav
        class="bg-white shadow-sm border-b border-gray-200 py-4 px-8 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-[#16ac2f] rounded-xl flex items-center justify-center text-white font-bold shadow-md">
                DB
            </div>
            <div>
                <h1 class="font-bold text-lg text-gray-800 leading-tight">Portal Admin Desa</h1>
                <p class="text-xs text-gray-500">Bogoran, Kampak, Trenggalek</p>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <a href="/" target="_blank" class="text-sm text-gray-500 hover:text-[#24b44f] font-semibold">Lihat Web Desa
                ↗</a>
            <form action="{{ route('logout') }}" method="POST" class="inline" id="logoutForm">
                @csrf
                <button type="submit"
                    class="bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-lg text-sm font-bold transition cursor-pointer active:scale-95"
                    id="logoutBtn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto p-8 mt-4 max-w-7xl">

        <div class="mb-10 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800">Selamat Datang, Admin! 👋</h2>
                <p class="text-gray-500 mt-2">Pilih menu di bawah ini untuk mengelola konten dan pelayanan website Desa
                    Bogoran.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <a href="{{ route('admin.dashboard') }}"
                class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#6dc274]/30 transition duration-300 relative overflow-hidden block">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <svg class="w-24 h-24 text-[#6dc274]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
                        </path>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-rose-100 text-rose-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-[#21973f] transition">Pengaduan
                        Warga</h3>
                    <p class="text-sm text-gray-500 mb-4">Kelola laporan, masalah, dan aspirasi masyarakat desa.</p>
                    <div class="flex gap-2">
                        <span class="text-xs font-bold bg-gray-100 px-2 py-1 rounded text-gray-600">Total:
                            {{ $totalPengaduan }}</span>
                        @if($pengaduanBaru > 0)
                        <span class="text-xs font-bold bg-red-100 px-2 py-1 rounded text-red-600">{{ $pengaduanBaru }}
                            Menunggu</span>
                        @endif
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.berita.index') }}"
                class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#32b34e]/30 transition duration-300 relative overflow-hidden block">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                    <svg class="w-24 h-24 text-[#32b34e]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                            clip-rule="evenodd"></path>
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-[#2abe5b] transition">Berita &
                        Artikel</h3>
                    <p class="text-sm text-gray-500 mb-4">Tulis berita terbaru, pengumuman, atau artikel kegiatan desa.
                    </p>
                    <div class="flex gap-2">
                        <span
                            class="text-xs font-bold text-[#40d323] group-hover:underline flex items-center gap-1">Kelola
                            Berita ↗</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.galeri.index') }}"
                class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#17bb56]/30 transition duration-300 relative overflow-hidden block">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                    <svg class="w-24 h-24 text-[#17bb56]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-[#4ca324] transition">Galeri Foto
                    </h3>
                    <p class="text-sm text-gray-500 mb-4">Kelola album foto kegiatan, potensi desa, dan acara warga.</p>
                    <div class="flex gap-2">
                        <span
                            class="text-xs font-bold text-[#6dc287] group-hover:underline flex items-center gap-1">Kelola
                            Galeri ↗</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.anggota.index') }}"
                class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#8b5cf6]/30 transition duration-300 relative overflow-hidden block">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                    <svg class="w-24 h-24 text-[#8b5cf6]" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-[#8b5cf6] transition">Perangkat
                        Desa</h3>
                    <p class="text-sm text-gray-500 mb-4">Kelola data Kepala Desa, Sekretaris, dan staf desa lainnya.
                    </p>
                    <div class="flex gap-2">
                        <span
                            class="text-xs font-bold text-[#8b5cf6] group-hover:underline flex items-center gap-1">Kelola
                            Tim ↗</span>
                    </div>
                </div>
            </a>

        </div>
    </div>
</body>

</html>