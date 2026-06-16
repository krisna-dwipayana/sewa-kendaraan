@extends('layouts.user')

@section('content')
    <section class="relative bg-gray-900 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover opacity-30" alt="Background">
        
        <div class="relative max-w-7xl mx-auto px-6 py-20 md:py-32 flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 text-white pr-0 md:pr-12">
                <h3 class="text-lg font-bold tracking-widest uppercase mb-2">RENTALKU</h3>
                <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                    Bagaimana Kami Bisa <span class="italic font-light">Membantu?</span>
                </h1>
                <p class="text-lg text-gray-300">Menyediakan solusi satu atap untuk semua kebutuhan sewa kendaraan anda di Jabodetabek.</p>
            </div>
            

            
            <div class="bg-white p-8 rounded-sm shadow-2xl w-full max-w-md">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Pesan Kendaraan</h3>
    
    <form action="{{ route('user.katalog') }}" method="GET">
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Tanggal Ambil</label>
            <input type="date" name="tanggal_mulai" required 
                   class="w-full border border-gray-300 p-2 rounded bg-gray-50 focus:border-blue-500 outline-none">
        </div>
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_selesai" required 
                   class="w-full border border-gray-300 p-2 rounded bg-gray-50 focus:border-blue-500 outline-none">
        </div>
        <button type="submit" class="w-full bg-[#3b82f6] text-white font-bold py-3 mt-4 hover:bg-blue-600 transition">
            CARI KENDARAAN
        </button>
    </form>
</div>
    </section>

    <section class="bg-white py-20 px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-[#007bff] mb-4">
            Berdedikasi untuk <span class="italic font-light">Pelanggan.</span>
        </h2>
        <p class="max-w-4xl mx-auto text-gray-600 mb-12 text-lg">
            Kami bangga memberikan tingkat layanan pelanggan tertinggi. Armada kami meliputi mobil keluarga, van niaga, hingga bus pariwisata yang siap menemani perjalanan Anda.
        </p>

        <div class="flex justify-center gap-6 border-b-2 border-gray-100 mb-12 max-w-3xl mx-auto flex-wrap">
            <button id="tab-motor" onclick="filterKendaraan('Roda Dua', this)" class="tab-btn pb-4 text-gray-400 hover:text-[#007bff] font-bold text-xl transition">Sewa Motor</button>
            <button onclick="filterKendaraan('Roda Empat', this)" class="tab-btn pb-4 text-gray-400 hover:text-[#007bff] font-bold text-xl transition">Sewa Mobil</button>
            <button onclick="filterKendaraan('Wisata', this)" class="tab-btn pb-4 text-gray-400 hover:text-[#007bff] font-bold text-xl transition">Sewa Kendaraan Wisata</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto items-stretch" id="kendaraan-container">
            @forelse($kendaraans as $k)
                <!-- YANG INI UDAH AKU BENERIN TYPO-NYA YA SAYANG -->
                <div class="kendaraan-card bg-white p-6 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-between" 
                     data-kategori="{{ $k->kategori->nama_kategori ?? 'Roda Dua' }}">
                    
                    <div>
                        <div class="h-40 flex items-center justify-center mb-6">
                            @if($k->gambar)
                                <!-- PATH FOTONYA JUGA UDAH AKU GANTI JADI STORAGE -->
                                <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->nama_kendaraan }}" class="max-h-full object-contain hover:scale-110 transition duration-300">
                            @else
                                <span class="text-gray-400 text-xs">No Image</span>
                            @endif
                        </div>
                        
                        <h4 class="text-gray-800 text-xl font-extrabold mb-1">{{ $k->nama_kendaraan }}</h4>
                        <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full mb-3">
                            {{ $k->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                        
                        <p class="text-[#007bff] text-lg font-bold">
                            Rp {{ number_format($k->harga_sewa, 0, ',', '.') }} <span class="text-sm text-gray-400 font-normal">/hari</span>
                        </p>
                    </div>

                    @auth
    <a href="{{ route('user.sewa', $k->id) }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg py-4 rounded-xl transition duration-300 shadow-lg">
        Booking Sekarang
    </a>
@endauth

@guest
    <a href="{{ route('register') }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg py-4 rounded-xl transition duration-300 shadow-lg">
        Booking Sekarang
    </a>
@endguest
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-xl">Belum ada armada yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <a id="btn-katalog" href="#" class="mt-16 inline-block bg-[#e74c3c] text-white px-8 py-3 text-lg font-bold hover:bg-red-600 transition shadow-md rounded-full">
            Lihat Katalog Lengkap
        </a>
    </section>

    <section class="flex flex-col md:flex-row bg-[#2b2b2b] overflow-hidden">
        <div class="w-full md:w-1/2 min-h-[450px] relative">
            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Armada RentalKu">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="w-full md:w-1/2 p-12 md:p-20 flex flex-col justify-center text-white bg-gradient-to-r from-gray-900 to-gray-800 relative">
            <h2 class="text-4xl font-bold mb-8">
                Apa Kata <span class="italic font-light">Mereka?</span>
            </h2>

            <div class="relative h-[280px] md:h-[220px]">
                <div class="testimonial-item transition-all duration-500 opacity-100 block">
                    <div class="flex text-[#007bff] text-2xl mb-6">★★★★★</div>
                    <p class="text-xl italic mb-8 text-gray-300 font-serif leading-relaxed">
                        "RentalKu menawarkan layanan pelanggan terbaik yang pernah saya temui. Sangat membantu di setiap tahap penyewaan. Kendaraannya terawat dengan baik dan harganya sangat terjangkau."
                    </p>
                    <p class="font-bold border-l-4 border-[#007bff] pl-4 text-lg">Bapak Budi - Pengusaha</p>
                </div>

                <div class="testimonial-item transition-all duration-500 opacity-0 hidden">
                    <div class="flex text-[#007bff] text-2xl mb-6">★★★★★</div>
                    <p class="text-xl italic mb-8 text-gray-300 font-serif leading-relaxed">
                        "Sewa mobil di sini beneran lepas kunci tanpa ribet. Kondisi unit Toyota Avanza-nya masih wangi dan mesinnya halus banget buat dibawa mudik kemarin. Top banget!"
                    </p>
                    <p class="font-bold border-l-4 border-[#007bff] pl-4 text-lg">Mas Adi - Karyawan Swasta</p>
                </div>

                <div class="testimonial-item transition-all duration-500 opacity-0 hidden">
                    <div class="flex text-[#007bff] text-2xl mb-6">★★★★★</div>
                    <p class="text-xl italic mb-8 text-gray-300 font-serif leading-relaxed">
                        "Adminnya sangat responsif di WhatsApp. Saya butuh motor mendadak malam-malam, langsung diproses dengan cepat. Sangat menyelamatkan!"
                    </p>
                    <p class="font-bold border-l-4 border-[#007bff] pl-4 text-lg">Sarah - Mahasiswa</p>
                </div>

                <div class="testimonial-item transition-all duration-500 opacity-0 hidden">
                    <div class="flex text-[#007bff] text-2xl mb-6">★★★★★</div>
                    <p class="text-xl italic mb-8 text-gray-300 font-serif leading-relaxed">
                        "Pilihan kendaraannya lengkap, mulai dari motor matic sampe Bus buat rombongan kantor. Harganya jujur, nggak ada biaya tersembunyi. Rekomended!"
                    </p>
                    <p class="font-bold border-l-4 border-[#007bff] pl-4 text-lg">Ibu Siti - Ibu Rumah Tangga</p>
                </div>

                <div class="testimonial-item transition-all duration-500 opacity-0 hidden">
                    <div class="flex text-[#007bff] text-2xl mb-6">★★★★★</div>
                    <p class="text-xl italic mb-8 text-gray-300 font-serif leading-relaxed">
                        "Baru kali ini nemu rental yang unitnya bener-bener kayak baru semua. Kebersihan terjaga dan asuransinya bikin tenang selama perjalanan di Jakarta."
                    </p>
                    <p class="font-bold border-l-4 border-[#007bff] pl-4 text-lg">Pak Heru - Traveler</p>
                </div>
            </div>

            <div class="flex items-center gap-6 mt-12">
                <div class="flex gap-2">
                    <button onclick="prevTesti()" class="w-12 h-12 rounded-full border border-gray-600 flex items-center justify-center hover:bg-[#007bff] hover:border-[#007bff] transition duration-300">
                        <span class="text-xl">&larr;</span>
                    </button>
                    <button onclick="nextTesti()" class="w-12 h-12 rounded-full border border-gray-600 flex items-center justify-center hover:bg-[#007bff] hover:border-[#007bff] transition duration-300">
                        <span class="text-xl">&rarr;</span>
                    </button>
                </div>
                
                <div class="flex gap-2" id="testi-dots">
                    <span class="dot w-3 h-3 rounded-full bg-[#007bff]"></span>
                    <span class="dot w-3 h-3 rounded-full bg-gray-600"></span>
                    <span class="dot w-3 h-3 rounded-full bg-gray-600"></span>
                    <span class="dot w-3 h-3 rounded-full bg-gray-600"></span>
                    <span class="dot w-3 h-3 rounded-full bg-gray-600"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-20 bg-white px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-[#007bff] mb-4">
            Mulai Sewa <span class="italic font-light">Sekarang...</span>
        </h2>
        <p class="text-gray-600 mb-10 text-lg">Biarkan kami mengurus kebutuhan transportasi Anda. Klik tombol di bawah untuk memulai.</p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
    <!-- Tombol Pesan Sekarang -->
    <a href="{{ route('user.katalog') }}" class="bg-red-500 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-red-600 transition flex items-center justify-center">
        📅 Pesan Sekarang
    </a>

    <!-- Tombol Hubungi Kami -->
    <a href="https://wa.me/6285967972691?text=Halo%20Admin%20RentalKu" target="_blank" class="bg-gray-800 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-black transition flex items-center justify-center">
        📞 Hubungi Kami
    </a>
</div>
    </section>

    {{-- ===================== SECTION FAQ (DENGAN TOGGLE) ===================== --}}
    <section class="relative bg-gray-900 text-white py-24 px-6 border-t-[16px] border-gray-800">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        
        <div class="relative max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-4">
                Pertanyaan yang Sering <span class="italic font-light">Diajukan</span>
            </h2>
            <p class="text-center text-gray-400 mb-16 text-lg">Jika Anda tidak menemukan jawaban, silakan hubungi admin kami.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-0">

                {{-- Kolom Kiri --}}
                <div>
                    {{-- FAQ Item 1 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Apa syarat lepas kunci?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Penyewa wajib menyerahkan E-KTP asli sebagai jaminan, menunjukkan SIM A (untuk mobil) atau SIM C (untuk motor) yang masih berlaku, serta mengisi dan menandatangani formulir persetujuan sewa. Untuk penyewa baru, kami mungkin meminta dokumen pendukung tambahan seperti Kartu Keluarga atau ID Karyawan untuk verifikasi data.
                            </p>
                        </div>
                    </div>

                    {{-- FAQ Item 2 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Berapa usia minimum penyewa?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Usia minimum penyewa adalah 17 tahun untuk motor dan 21 tahun untuk mobil, dengan syarat sudah memiliki SIM yang sah dan aktif. Penyewa di bawah 25 tahun mungkin dikenakan deposit tambahan sebagai jaminan. Kami berhak menolak penyewaan jika dirasa penyewa belum cukup berpengalaman berkendara.
                            </p>
                        </div>
                    </div>

                    {{-- FAQ Item 3 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Bagaimana jika terjadi kerusakan?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Penyewa bertanggung jawab penuh atas kerusakan yang terjadi selama masa sewa. Untuk kerusakan ringan (lecet, penyok kecil), biaya perbaikan akan dipotong dari deposit atau ditagihkan langsung. Untuk kerusakan berat akibat kecelakaan, klaim asuransi dapat diajukan, namun penyewa tetap menanggung biaya deductible (risiko sendiri) sesuai polis yang berlaku.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div>
                    {{-- FAQ Item 4 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Apakah bahan bakar harus penuh saat kembali?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Kami menerapkan sistem Bar-to-Bar, yaitu kendaraan harus dikembalikan dengan kondisi bahan bakar yang sama persis seperti saat diambil. Jika indikator BBM saat kembali lebih rendah dari saat pengambilan, akan dikenakan biaya pengisian BBM ditambah biaya layanan sebesar Rp 15.000.
                            </p>
                        </div>
                    </div>

                    {{-- FAQ Item 5 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Apakah bisa bayar pakai E-Wallet?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Ya, kami menerima berbagai metode pembayaran termasuk transfer bank, GoPay, OVO, Dana, dan ShopeePay. Pembayaran tunai juga diterima langsung di lokasi. Untuk pemesanan online, pelunasan dapat dilakukan via transfer bank minimal H-1 sebelum tanggal pengambilan kendaraan.
                            </p>
                        </div>
                    </div>

                    {{-- FAQ Item 6 --}}
                    <div class="border-b border-gray-700">
                        <button onclick="toggleHomeFaq(this)" class="home-faq-btn w-full flex items-center gap-4 py-4 hover:text-gray-300 transition-colors text-left focus:outline-none">
                            <span class="home-faq-icon text-gray-500 font-light text-xl flex-shrink-0" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                            <span class="text-lg">Apakah bisa dibawa ke luar kota?</span>
                        </button>
                        <div class="home-faq-content text-gray-400 text-sm leading-relaxed" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="pb-4 pl-8 pr-2">
                                Untuk armada roda empat dan kendaraan wisata, penyewaan dapat digunakan di seluruh area Jabodetabek dan luar kota dalam Pulau Jawa tanpa biaya tambahan. Penggunaan ke luar Pulau Jawa wajib diinformasikan terlebih dahulu untuk penyesuaian asuransi dan administrasi. Untuk motor, penggunaan dibatasi hanya dalam area Jabodetabek.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-12">
                <a href="{{ route('user.faq') }}" class="inline-block bg-white text-gray-800 px-8 py-3 text-lg font-bold hover:bg-gray-200 transition">
                    Lihat Semua FAQ
                </a>
            </div>
        </div>
    </section>
    {{-- ===================== END SECTION FAQ ===================== --}}

    {{-- ===================== SECTION KAMI TERVERIFIKASI ===================== --}}
    <section class="bg-white py-16 border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="text-left">
                    <h3 class="text-3xl font-extrabold text-[#007bff]">
                        Kami <span class="font-light italic text-gray-800">Terverifikasi.</span>
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">Sesuai dengan regulasi dan perizinan resmi pemerintah Indonesia.</p>
                </div>
                
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    <img src="{{ asset('images/logos/bpkm.svg') }}" alt="Logo BKPM OSS" class="h-14 md:h-16 object-contain" title="BKPM / OSS">
                    <img src="{{ asset('images/logos/bps.svg') }}" alt="Logo BPS" class="h-14 md:h-16 object-contain" title="Badan Pusat Statistik">
                    <img src="{{ asset('images/logos/hukum.svg') }}" alt="Logo Kemenkumham" class="h-14 md:h-16 object-contain" title="Kementerian Hukum dan HAM">
                    <img src="{{ asset('images/logos/pajak.svg') }}" alt="Logo DJP Pajak" class="h-14 md:h-16 object-contain" title="Direktorat Jenderal Pajak">
                    <img src="{{ asset('images/logos/polri.svg') }}" alt="Logo Polri" class="h-14 md:h-16 object-contain" title="Kepolisian Negara Republik Indonesia">
                </div>
            </div>
        </div>
    </section>
    {{-- ===================== END SECTION KAMI TERVERIFIKASI ===================== --}}

    <script>
        let activeKeyword = 'Roda Dua';

        const ruteKatalog = {
            'Roda Dua': '{{ route("user.katalog") }}',
            'Roda Empat': '{{ route("user.katalog") }}',
            'Wisata': '{{ route("user.katalog") }}'
        };

        function filterKendaraan(keyword, btnClicked) {
            activeKeyword = keyword; 

            let buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-b-4', 'border-[#007bff]', 'text-[#007bff]');
                btn.classList.add('text-gray-400');
            });

            if(btnClicked) {
                btnClicked.classList.remove('text-gray-400');
                btnClicked.classList.add('border-b-4', 'border-[#007bff]', 'text-[#007bff]');
            }

            let cards = document.querySelectorAll('.kendaraan-card');
            let jumlahTampil = 0;
            
            cards.forEach(card => {
                let kategoriMobil = card.getAttribute('data-kategori');
                if (kategoriMobil.includes(activeKeyword) && jumlahTampil < 3) {
                    card.style.display = 'flex';
                    jumlahTampil++;
                } else {
                    card.style.display = 'none';
                }
            });

            let btnKatalog = document.getElementById('btn-katalog');
            if(btnKatalog) {
                btnKatalog.href = ruteKatalog[activeKeyword];
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            let tabMotor = document.getElementById('tab-motor');
            if(tabMotor) {
                filterKendaraan('Roda Dua', tabMotor);
            }
        });

        setInterval(() => {
            fetch(window.location.href)
                .then(response => response.text())
                .then(html => {
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(html, 'text/html');
                    let newGridHTML = doc.getElementById('kendaraan-container').innerHTML;
                    document.getElementById('kendaraan-container').innerHTML = newGridHTML;
                    filterKendaraan(activeKeyword, null);
                })
                .catch(err => console.log('Gagal update data real-time', err));
        }, 5000); 

        // SLIDER TESTIMONI
        let currentTesti = 0;
        const items = document.querySelectorAll('.testimonial-item');
        const dots = document.querySelectorAll('.dot');

        function showTesti(index) {
            items.forEach((item, i) => {
                item.classList.add('opacity-0', 'hidden');
                item.classList.remove('opacity-100', 'block');
                dots[i].classList.remove('bg-[#007bff]');
                dots[i].classList.add('bg-gray-600');
            });
            items[index].classList.remove('opacity-0', 'hidden');
            items[index].classList.add('opacity-100', 'block');
            dots[index].classList.add('bg-[#007bff]');
            dots[index].classList.remove('bg-gray-600');
        }

        function nextTesti() {
            currentTesti = (currentTesti + 1) % items.length;
            showTesti(currentTesti);
        }

        function prevTesti() {
            currentTesti = (currentTesti - 1 + items.length) % items.length;
            showTesti(currentTesti);
        }

        setInterval(nextTesti, 10000);

        // TOGGLE FAQ HOME
        function toggleHomeFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.home-faq-icon');
            const isOpen = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';

            // Tutup semua FAQ lain
            document.querySelectorAll('.home-faq-btn').forEach((btn) => {
                if (btn !== button) {
                    const otherContent = btn.nextElementSibling;
                    const otherIcon = btn.querySelector('.home-faq-icon');
                    otherContent.style.maxHeight = '0px';
                    otherIcon.textContent = '+';
                    otherIcon.style.color = '#6b7280';
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle yang diklik
            if (isOpen) {
                content.style.maxHeight = '0px';
                icon.textContent = '+';
                icon.style.color = '#6b7280';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.textContent = '✕';
                icon.style.color = '#3b82f6';
                icon.style.transform = 'rotate(90deg)';
            }
        }
    </script>
@endsection