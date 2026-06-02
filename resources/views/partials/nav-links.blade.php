<li>
    <a href="/"
        class="{{ request()->is('/') ? 'text-[#74c26d] font-bold border-b-2 border-[#6dc290] pb-1' : 'hover:text-[#6dc27b] transition' }}">
        Beranda
    </a>
</li>

<li>
    <a href="{{ route('about') }}"
        class="{{ request()->routeIs('about') ? 'text-[#6dc26d] font-bold border-b-2 border-[#6dc282] pb-1' : 'hover:text-[#6dc271] transition' }}">
        Profil
    </a>
</li>

<li>
    <a href="{{ route('gallery') }}"
        class="{{ request()->routeIs('gallery') ? 'text-[#6dc271] font-bold border-b-2 border-[#6dc282] pb-1' : 'hover:text-[#6dc271] transition' }}">
        Gambar
    </a>
</li>

<li>
    <a href="{{ route('team') }}"
        class="{{ request()->routeIs('team') ? 'text-[#6dc26d] font-bold border-b-2 border-[#6dc282] pb-1' : 'hover:text-[#6dc27b] transition' }}">
        Anggota
    </a>
</li>

<li>
    <a href="{{ route('blog') }}"
        class="{{ request()->routeIs('blog') ? 'text-[#6dc271] font-bold border-b-2 border-[#6dc27f] pb-1' : 'hover:text-[#6dc278] transition' }}">
        Berita
    </a>
</li>

<li>
    <a href="{{ route('pengaduan') }}"
        class="{{ request()->routeIs('pengaduan') ? 'text-[#6dc271] font-bold border-b-2 border-[#70c26d] pb-1' : 'hover:text-[#6dc27b] transition' }}">
        Pengaduan
    </a>
</li>