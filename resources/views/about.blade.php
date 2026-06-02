@extends('layouts.app')

@section('title', 'Profil Desa Bogoran')

@section('content')
<div class="w-full max-w-5xl mx-auto px-4 py-12">

    <div class="bg-white/95 backdrop-blur-md p-8 md:p-12 rounded-3xl border border-gray-200 shadow-2xl text-left mb-8">
        <div class="border-b border-gray-200 pb-6 mb-8 text-center md:text-left">
            <h2 class="text-4xl font-bold text-gray-900 mb-2 tracking-tight">Profil <span class="text-[#14bb5a]">Desa
                    Bogoran</span></h2>
            <p class="text-gray-600 italic">Kecamatan Kampak, Kabupaten Trenggalek, Jawa Timur</p>
        </div>

        <div class="space-y-6 text-sm md:text-base leading-relaxed text-gray-800">
            <p>
                <strong class="text-[#14bb5a]">Desa Bogoran</strong> merupakan salah satu desa yang terletak di jantung
                Kecamatan Kampak, Kabupaten Trenggalek. Desa ini dikenal dengan bentang alamnya yang asri, berupa
                pegunungan dan perbukitan, serta semangat gotong royong warganya yang masih sangat kental.
            </p>
            <p>Desa Bogoran yang berkantor kelurahan di jln. Mliwis putih No. 27 Bogoran Kampak Trenggalek kode pos
                66373 merupakan salah satu desa di kecamatan Kampak Kabupaten Trenggalek Jawa Timur dengan ketinggian
                149 meter dari atas permukaan laut, desa Bogoran secara umum berupa daerah pegunungan dan perbukitan
                serta hutan namun untuk transportasi sudah tidak ada kendalan karena pembangunan jalan sudah merata.
                Luas wilayah desa Bogoran 971 ha dengan kisaran penduduk 4.802 jiwa penduduk yang mayoritas berprofesi
                sebagai petani, desa Bogoran terdiri dari 3 dusun krajan, 11 RW, dan 38 RT.
            </p>

            <p>
                <strong class="text-[#14bb5a]">Profil Desa Bogoran Secara Umum Sebagai Berikut :</strong>
            </p>

            <p> 1. Letak Geografis, lokasi terletak koordinat bujur 1110 39’ 41 dan koor dinat lintang 80 10’52’LS
                dengan ketinggian 149 meter dari atas permukaan laut.</p>
            <P>2. Wilayah Administratif, meliputi tiga dusun utama yaitu dusun krajan, Dusun Branjang dan Dusun Gambar
                yang terdiri dari 11 RW dan 38 RT.</P>
            <p>3. Demografi & Mata pencaharian, Penduduk kurang lebih 4.802 jiwa dengan mata pencaharian mayoritas
                petani selebihnya ada yang berprofesi sebagai PNS, TNI, POLRI dan sektor swasta.</p>
            <p>4. Sektor Pariwisata, Memilki destinasi wisata yang telah dikenal luas dimasyarakat antara lain GUPILI (
                Gubuk Pinggir Kali ) serta jurug Mangir yang terletak di dusun ngguli.</p>
            <p>5. Potensi UMKM, memiliki kurang lebih 31 pelaku umkm yang memproduksi camilan seperti keripik, tempe,
                alen-alen, sale pisang serta kerajinan kayu yang di pusat di lokasi PUJASERA setono</p>

            <p>
                Secara administratif, Desa Bogoran terus bertransformasi menjadi desa digital untuk mempermudah
                pelayanan publik dan keterbukaan informasi bagi seluruh lapisan masyarakat. Website ini adalah salah
                satu langkah nyata kami dalam mewujudkan tata kelola pemerintahan desa yang modern dan transparan.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">

        <div class="bg-white/95 backdrop-blur-md rounded-4xl p-8 shadow-xl text-gray-800 border border-white/40">
            <h3 class="font-black text-xl mb-6 text-black">Batas Desa:</h3>

            <div class="grid grid-cols-2 gap-y-6 gap-x-4 text-sm mb-8">
                <div>
                    <p class="font-bold text-black mb-1">Utara</p>
                    <p class="text-gray-600 leading-tight">Desa Bendoagung dan Desa Timahan</p>
                </div>
                <div>
                    <p class="font-bold text-black mb-1">Timur</p>
                    <p class="text-gray-600 leading-tight">Desa Bendoagung</p>
                </div>
                <div>
                    <p class="font-bold text-black mb-1">Selatan</p>
                    <p class="text-gray-600 leading-tight">Desa Ngadimulyo dan Desa Karangrejo</p>
                </div>
                <div>
                    <p class="font-bold text-black mb-1">Barat</p>
                    <p class="text-gray-600 leading-tight">Desa Pringapus</p>
                </div>
            </div>

            <div class="border-t-2 border-gray-100 py-5 flex justify-between items-center">
                <span class="font-black text-black">Luas Desa:</span>
                <span class="text-gray-600 font-medium">9.710.000 m² <span class="text-xs opacity-70">(971
                        Ha)</span></span>
            </div>

            <div class="border-t-2 border-gray-100 pt-5 flex justify-between items-center">
                <span class="font-black text-black">Jumlah Penduduk:</span>
                <span class="text-gray-600 font-medium">4.802 Jiwa</span>
            </div>
        </div>

        <div
            class="rounded-4xl shadow-xl overflow-hidden h-[350px] md:h-auto relative border border-white/40 bg-white/50">
            <iframe
                src="https://maps.google.com/maps?q=Balai+Desa+Bogoran,+Kampak,+Trenggalek&t=&z=16&ie=UTF8&iwloc=&output=embed"
                class="absolute top-0 left-0 w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>

    <div class="mt-12 text-center">
        <a href="{{ route('about') }}"
            class="text-xs uppercase tracking-[0.2em] text-white/50 hover:text-[#30ce45] transition duration-300 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>

</div>
@endsection