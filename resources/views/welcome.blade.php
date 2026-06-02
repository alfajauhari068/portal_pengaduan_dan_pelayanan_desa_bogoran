@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="w-full min-h-[85vh] flex flex-col items-center justify-center text-center">
    <h3 class="text-4xl md:text-6xl font-bold mb-4 tracking-wide drop-shadow-lg text-white">
        Desa Bogoran
    </h3>

    <p class="text-lg md:text-xl mb-10 max-w-xl opacity-90 leading-relaxed text-white">
        Selamat datang di website Desa Bogoran untuk mempermudah informasi atau <br class="hidden md:block"> keluhan di
        pemerintahan desa.
    </p>

    <div>
        <a href="#sambutan"
            class="bg-[#1a921a] hover:bg-[#74e00f] text-white font-semibold py-2 px-8 border border-white/20 rounded transition duration-300 inline-block shadow-lg">
            More Info
        </a>
    </div>
</div>


<div id="sambutan" class="w-full max-w-6xl mx-auto px-4 py-24 mt-16">
    <div
        class="bg-white/95 backdrop-blur-md rounded-[2.5rem] p-8 md:p-12 shadow-2xl flex flex-col md:flex-row items-start gap-12 text-gray-800">

        <div class="w-full md:w-1/3 flex justify-center pt-4">
            <div
                class="w-64 h-64 bg-white rounded-full flex items-center justify-center p-6 shadow-[0_10px_40px_rgba(0,0,0,0.1)] border-4 border-gray-50">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Desa Bogoran" class="w-full h-full object-contain">
            </div>
        </div>

        <div class="w-full md:w-2/3 text-left">
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#8be934] mb-2 tracking-tight">Sambutan Kepala Desa
                Bogoran</h2>

            <h3 class="text-xl font-black tracking-[0.2em] uppercase mt-6 mb-1 text-black">Ihsanuddin, SE.</h3>
            <p class="text-sm font-bold text-gray-600 mb-6 border-b-2 border-gray-100 pb-4 inline-block">Kepala Desa
                Bogoran</p>

            <div class="mt-8 text-gray-700 leading-relaxed space-y-6 text-sm md:text-base text-justify">
                <p class="font-bold text-black text-base md:text-lg">Assallamu Allaikum Warohmatullahi Wabarokatu.</p>

                <p>Website ini hadir sebagai wujud transformasi Desa Bogoran menjadi desa yang mampu memanfaatkan
                    teknologi informasi dan komunikasi, terintegrasi ke dalam sistem online.</p>

                <p>Keterbukaan informasi publik, pelayanan masyarakat dan kegiatan perekonomian di desa, guna mewujudkan
                    Desa Bogoran sebagai desa wisata yang berkelanjutan, adaptasi dan mitigasi terhadap perubahan iklim
                    serta menjadi desa yang mandiri.</p>

                <p>Melalui website ini juga, kami berharap masyarakat dapat dengan mudah memberikan saran, pengaduan,
                    maupun aspirasi untuk bersama-sama membangun Desa Bogoran yang lebih baik, sejahtera, dan religius
                    ke depannya.</p>
            </div>
        </div>
    </div>
</div>
@endsection