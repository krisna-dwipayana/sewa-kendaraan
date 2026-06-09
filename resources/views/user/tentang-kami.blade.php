@extends('layouts.user')

@section('content')
    <section class="bg-[#007bff] text-white py-20 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Tentang Kami</h1>
            <p class="text-lg text-blue-100">Mengenal lebih dekat perjalanan, nilai, dan dedikasi RentalKu untuk mobilitas Anda.</p>
        </div>
    </section>

    <section class="bg-white py-16 px-6 min-h-[60vh]">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">
            
            <div class="lg:col-span-2 space-y-6 text-gray-600 leading-relaxed text-lg">
                <h2 class="text-3xl font-light text-[#007bff] mb-2">Sejarah RentalKu</h2>
                <h3 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-100 pb-4 mb-6">
                    Hadir Melayani Sejak 2021
                </h3>
                
                <p>RentalKu berawal dari sebuah inisiatif kecil di kawasan Jabodetabek pada pertengahan tahun 2021. Pada awalnya, fokus utama kami hanyalah menyediakan layanan penyewaan kendaraan roda dua untuk mahasiswa dan pekerja komuter yang membutuhkan mobilitas cepat, praktis, dan efisien.</p>
                
                <p>Seiring berjalannya waktu dan meningkatnya kepercayaan pelanggan, pada tahun 2023 kami mulai mengekspansi armada dengan menghadirkan mobil keluarga (MPV) dan kendaraan niaga. Fokus kami selalu bertumpu pada perawatan mesin dan kebersihan unit, memastikan setiap kendaraan yang keluar dari garasi kami berada dalam kondisi prima layaknya mobil baru.</p>
                
                <p>Saat ini, sebagian besar armada kami merupakan kendaraan keluaran terbaru. Walaupun begitu, kami tetap melakukan servis dan perawatan preventif secara mandiri (in-house) di bengkel internal kami untuk memastikan standar kualitas dan keamanan tidak pernah menurun sedikit pun.</p>
                
                <p>Bisnis ini terus berkembang dari hari ke hari! Hal ini seutuhnya berkat kerja keras seluruh tim RentalKu yang bekerja tanpa lelah demi memberikan tingkat layanan pelanggan tertinggi di industri penyewaan transportasi Indonesia.</p>
            </div>

            <div class="space-y-6 sticky top-24">
                <div class="bg-white border border-gray-200 p-6 rounded-sm shadow-xl text-center">
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2 mb-6">
                        <span class="text-gray-400">🔍</span>
                        <input type="text" placeholder="Cari kendaraan..." class="w-full ml-2 outline-none text-sm bg-transparent">
                    </div>

                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=600&auto=format&fit=crop" alt="Armada RentalKu" class="w-full h-40 object-cover mb-0">
                    <a href="{{ route('home') }}" class="block w-full bg-[#007bff] hover:bg-blue-700 text-white font-bold py-4 transition text-lg shadow-inner">
                        📰 Booking Online Sekarang
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="border-t border-gray-200 bg-white py-16 px-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">
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
    </section>
@endsection