<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    #video-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -2;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: -1;
    }

    #sidebar {
        transition: transform 0.3s ease-in-out;
    }
    </style>
</head>

<body class="min-h-screen text-white font-sans antialiased flex flex-col overflow-x-hidden">

    <div class="fixed top-0 left-0 w-full h-full z-[-2]">
        <img src="{{ asset('assets/balai-desa.jpeg') }}" class="w-full h-full object-cover"
            alt="Background Desa Bogoran">
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-black/40 z-[-1]"></div>

    <header class="border-b border-white/20 relative z-30 bg-black/30">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <div class="logo">
                <a href="/" class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center overflow-hidden border border-white shadow-md">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-full h-full object-contain p-1">
                    </div>
                    <div class="hidden sm:block drop-shadow-md">
                        <h1 class="font-bold text-lg md:text-xl leading-none tracking-wide text-white">Desa Bogoran</h1>
                        <p class="text-[10px] md:text-[11px] mt-1 text-gray-200 font-medium leading-tight">
                            Kecamatan Kampak, Kabupaten Trenggalek<br>
                            Provinsi Jawa Timur
                        </p>
                    </div>
                </a>
            </div>



            <div class="hidden md:flex items-center space-x-8">
                <nav>
                    <ul class="flex space-x-8 text-sm font-medium items-center">
                        @include('partials.nav-links')
                    </ul>
                </nav>

                <a href="{{ route('login') }}"
                    class="bg-[#c26d88] hover:bg-[#a85973] text-white px-5 py-2 rounded-lg text-sm font-bold transition shadow-lg">
                    Login
                </a>
            </div>

            <button id="hamburger"
                class="md:hidden flex flex-col space-y-1.5 focus:outline-none p-2 bg-white/5 rounded-lg">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
    </header>

    <div id="sidebar"
        class="fixed top-0 right-0 h-full w-64 bg-black/95 z-50 transform translate-x-full md:hidden shadow-2xl">
        <div class="p-6">
            <button id="close-sidebar" class="text-white text-xl mb-10 flex items-center opacity-70 hover:opacity-100">
                <span class="mr-2 text-2xl">&times;</span> Tutup Menu
            </button>
            <ul class="flex flex-col space-y-6 text-lg font-medium">
                @include('partials.nav-links')

                <div class="pt-6 border-t border-white/20 mt-4">
                    <a href="{{ route('login') }}"
                        class="block text-center bg-[#c26d88] hover:bg-[#a85973] text-white py-3 rounded-lg font-bold transition">
                        Login Admin
                    </a>
                </div>
            </ul>
        </div>
    </div>

    <main class="grow flex flex-col items-center justify-center text-center px-4 relative z-10">
        @yield('content')
    </main>

    <footer class="relative z-10 bg-black/40 border-t border-white/10 py-12">
        <div class="container mx-auto px-6">




            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-left">
                <div>
                    <h4 class="font-bold text-[#c26d88] mb-4">Desa Bogoran</h4>
                    <p class="text-sm text-gray-300 leading-relaxed">Jl. Raya Kampak, Kec. Kampak, Kabupaten Trenggalek,
                        Jawa Timur. Melayani warga dengan sepenuh hati.</p>
                </div>


                <div>
                    <h4 class="font-bold text-[#c26d88] mb-4">Akun Terhubung</h4>
                    <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/10">
                        <img src="{{ asset('assets/admin-kartun.png') }}" alt="Admin Kartun"
                            class="w-8 h-8 rounded-full border border-[#c26d88]">
                        <div class="text-xs">
                            <p class="font-bold">Admin Desa</p>
                            <p class="opacity-60 text-[10px]">Pemerintah Desa Bogoran</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-[#c26d88] mb-4">Media Sosial</h4>
                    <div class="flex gap-4 text-white">
                        <a href="https://www.facebook.com/profile.php?id=100088841958071" target="_blank"
                            class="hover:text-[#c26d88] hover:underline transition duration-300">
                            Facebook
                        </a>

                        <a href="https://www.instagram.com/desabogoran?igsh=MXRlcnUxOXZqcGt5cw==" target="_blank"
                            class="hover:text-[#c26d88] hover:underline transition duration-300">
                            Instagram
                        </a>
                    </div>
                </div>
            </div>
            <div
                class="mt-12 pt-6 border-t border-white/5 text-center text-[10px] text-gray-500 uppercase tracking-widest">
                © 2026 Pemerintah Desa Bogoran siap melayani.
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // Buka Sidebar
        $('#hamburger').on('click', function(e) {
            e.stopPropagation();
            $('#sidebar').removeClass('translate-x-full');
        });

        // Tutup Sidebar
        $('#close-sidebar').on('click', function() {
            $('#sidebar').addClass('translate-x-full');
        });

        // Klik di luar sidebar untuk menutup
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#sidebar').length && !$(e.target).closest('#hamburger').length) {
                $('#sidebar').addClass('translate-x-full');
            }
        });
    });
    </script>
</body>

</html>