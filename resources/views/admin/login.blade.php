<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Desa Bogoran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-900 flex items-center justify-center p-4 relative">
    <img src="{{ asset('assets/logo.png') }}"
        class="absolute inset-0 w-full h-full object-cover opacity-20 blur-sm z-0">

    <div
        class="relative z-10 w-full max-w-md bg-black/50 backdrop-blur-xl p-8 rounded-2xl border border-white/10 shadow-2xl">
        <div class="text-center mb-8">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-20 mx-auto mb-4 bg-white p-2 rounded-full">
            <h2 class="text-2xl font-bold text-white">Portal <span class="text-[#6dc278]">Bogoran</span></h2>
            <p class="text-sm text-gray-300 mt-2">Silakan masuk ke akun Anda</p>
        </div>

        @if($errors->any())
        <div class="bg-red-500/20 border border-red-500 text-red-200 p-3 rounded-lg mb-4 text-sm">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-white text-sm">Alamat Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-[#6dc26d] outline-none">
            </div>
            <div>
                <label class="text-white text-sm">Kata Sandi</label>
                <input type="password" name="password" required
                    class="w-full mt-1 bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-[#6dc26d] outline-none">
            </div>
            <button type="submit"
                class="w-full bg-[#6dc282] hover:bg-[#35cc3d] text-white font-bold py-3 rounded-lg mt-4 transition">
                Masuk
            </button>
        </form>
        <div class="text-center mt-4">
            <a href="/" class="text-xs text-gray-400 hover:text-white">&larr; Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>