<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RentalKu - Sewa Kendaraan Impian Anda</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />

        <!-- Pastikan app.js termuat agar Alpine.js jalan -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        
        <!-- Header Utama yang mengimplementasikan Alpine.js (x-data) -->
        <header x-data="{ open: false }" class="bg-white sticky top-0 z-50 border-b border-gray-100">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                
                <!-- KIRI: Logo -->
                <a href="{{ url('/') }}" class="text-2xl font-extrabold text-blue-600">
                    RENTAL<span class="text-gray-800">KU</span>
                </a>

                <!-- TENGAH: Menu Utama (Hanya tampil di Laptop/Tablet) -->
                <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-700">
                    <a href="{{ route('user.katalog', ['kategori' => 'Roda Dua']) }}" class="hover:text-blue-600 transition">Motor</a>
                    <a href="{{ route('user.katalog', ['kategori' => 'Roda Empat (Mobil)']) }}" class="hover:text-blue-600 transition">Mobil</a>
                    <a href="{{ route('user.katalog', ['kategori' => 'Kendaraan Wisata & Khusus']) }}" class="hover:text-blue-600 transition">Kendaraan Wisata</a>
                    <a href="{{ route('user.asuransi') }}" class="hover:text-blue-600 transition">Asuransi</a>
                    <a href="{{ route('user.tentang-kami') }}" class="hover:text-blue-600 transition">Tentang Kami</a>
                    <a href="{{ route('user.faq') }}" class="hover:text-blue-600 transition">FAQ</a>
                    <a href="{{ route('user.kontak') }}" class="hover:text-blue-600 transition">Kontak</a>
                </div>
                
                <!-- KANAN: Login/Register/Profile (Hanya tampil di Laptop/Tablet) -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-[#007bff] font-medium transition">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-[#007bff] text-white px-6 py-2 rounded-full font-medium hover:bg-blue-700 transition shadow-md">Daftar</a>
                    @else
                        <a href="{{ route('profile.edit') }}" class="flex items-center text-gray-700 hover:text-[#007bff] transition">
                            <span class="mr-2 font-medium text-sm">{{ auth()->user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 bg-gray-200 p-1.5 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </a>
                    @endguest
                </div>

                <!-- Tombol Hamburger Menu (Hanya tampil di HP) -->
                <div class="flex items-center md:hidden">
                    <button @click="open = ! open" class="text-gray-500 hover:text-gray-700 focus:outline-none p-2 bg-gray-100 rounded-md">
                        <!-- Ikon Menu Garis Tiga (Muncul saat menu ketutup) -->
                        <svg :class="{'hidden': open, 'block': ! open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Ikon Silang (Muncul saat menu terbuka) -->
                        <svg :class="{'hidden': ! open, 'block': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Dropdown Menu HP (Hanya muncul jika tombol hamburger diklik) -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-100">
                <div class="px-4 pt-2 pb-6 space-y-2 shadow-lg">
                    <a href="{{ route('user.katalog', ['kategori' => 'Roda Dua']) }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Motor</a>
                    <a href="{{ route('user.katalog', ['kategori' => 'Roda Empat (Mobil)']) }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Mobil</a>
                    <a href="{{ route('user.katalog', ['kategori' => 'Kendaraan Wisata & Khusus']) }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Kendaraan Wisata</a>
                    <a href="{{ route('user.asuransi') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Asuransi</a>
                    <a href="{{ route('user.tentang-kami') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Tentang Kami</a>
                    <a href="{{ route('user.faq') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">FAQ</a>
                    <a href="{{ route('user.kontak') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 border-b border-gray-200">Kontak</a>
                    
                    <!-- Area Auth di HP -->
                    <div class="pt-4">
                        @guest
                            <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 mb-2 text-gray-800 font-medium bg-gray-100 rounded-md">Masuk</a>
                            <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 text-white font-medium bg-blue-600 rounded-md">Daftar</a>
                        @else
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 bg-blue-50 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 bg-white p-1.5 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-blue-600">Lihat Profil & Pengaturan</p>
                                </div>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="bg-[#007bff] text-white pt-16 pb-8 border-t border-blue-600 mt-auto">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    
                    <div class="md:col-span-2 space-y-6">
                        <h2 class="text-3xl font-extrabold tracking-widest uppercase mb-4">
                            RENTAL<span class="text-blue-200">KU</span>
                        </h2>
                        <p class="text-blue-100 text-sm leading-relaxed max-w-sm">
                            Menyediakan solusi satu atap untuk semua kebutuhan sewa kendaraan Anda. Berkomitmen memberikan layanan terbaik dengan armada terawat dan harga transparan di area Jabodetabek.
                        </p>
                        <div class="text-sm text-blue-100 space-y-2">
                            <p>Jl. Margonda Raya No. 123, Kec. Beji<br>Kota Depok, Jawa Barat 16424</p>
                            <p class="italic opacity-80">NIB Perusahaan: 4166902</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-6 uppercase tracking-wider">Pintasan</h4>
                        <ul class="space-y-3 text-sm text-blue-100">
    <li><a href="{{ url('/') }}" class="hover:text-white hover:underline transition">Beranda</a></li>
    <li><a href="#" class="hover:text-white hover:underline transition">Tentang Kami</a></li>
    <li><a href="{{ route('user.katalog', ['kategori' => 'Roda Dua']) }}" class="hover:text-white hover:underline transition">Sewa Motor</a></li>
    <li><a href="{{ route('user.katalog', ['kategori' => 'Roda Empat (Mobil)']) }}" class="hover:text-white hover:underline transition">Sewa Mobil</a></li>
    <li><a href="{{ route('user.katalog', ['kategori' => 'Kendaraan Wisata & Khusus']) }}" class="hover:text-white hover:underline transition">Kendaraan Wisata</a></li>
</ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-6 uppercase tracking-wider">Informasi</h4>
                        <ul class="space-y-3 text-sm text-blue-100">
                            <li><a href="#" class="hover:text-white hover:underline transition">Asuransi & Perlindungan</a></li>
                            <li><a href="#" class="hover:text-white hover:underline transition">Kebijakan Privasi</a></li>
                            <li><a href="{{ route('user.faq') }}" class="hover:text-white hover:underline transition">FAQ & Bantuan</a></li>
                        </ul>
                    </div>

                </div>

                <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-blue-200">
                    <p>&copy; {{ date('Y') }} RENTALKU. Semua hak dilindungi.</p>
                    <div class="flex gap-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>