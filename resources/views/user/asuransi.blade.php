@extends('layouts.user')

@section('content')
    <section class="bg-[#007bff] text-white py-20 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Kebijakan Proteksi & Peraturan Sewa</h1>
            <p class="text-lg text-blue-100">Komitmen RentalKu dalam memberikan rasa aman dan kenyamanan optimal sepanjang perjalanan Anda.</p>
        </div>
    </section>

    <section class="bg-gray-50 py-16 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            <div class="lg:col-span-2 space-y-12">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="text-[#007bff]">01.</span> Syarat & Dokumen Penyewa
                    </h2>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <div>
                                <strong class="text-gray-800 block">Batas Usia Minimum</strong>
                                Penyewa wajib berusia minimal 18 tahun dan telah memiliki kartu identitas resmi yang sah.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <div>
                                <strong class="text-gray-800 block">Kepemilikan SIM Aktif</strong>
                                Wajib menunjukkan Surat Izin Mengemudi yang masih berlaku (SIM A untuk roda empat / kendaraan wisata, dan SIM C untuk roda dua).
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 font-bold">✓</span>
                            <div>
                                <strong class="text-gray-800 block">Verifikasi Dokumen Fisik</strong>
                                Bersedia menunjukkan e-KTP asli serta dokumen pendukung lainnya (seperti KK atau ID karyawan/mahasiswa) saat serah terima unit untuk keperluan validasi keamanan.
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="text-[#007bff]">02.</span> Ketentuan Klaim Proteksi & Asuransi
                    </h2>
                    <p class="text-gray-600 mb-6">Seluruh armada RentalKu telah dilindungi oleh proteksi asuransi guna meminimalisir kerugian finansial akibat insiden di jalan raya dengan ketentuan berikut:</p>
                    
                    <div class="space-y-4">
                        <div class="border-l-4 border-[#007bff] bg-blue-50/50 p-4 rounded-r-lg">
                            <strong class="text-gray-800 block mb-1">Biayar Risiko Sendiri (Own Damage / OD)</strong>
                            <p class="text-gray-600 text-sm">Jika terjadi kerusakan minor akibat kecelakaan atau goresan yang tidak disengaja, penyewa hanya dikenakan biaya risiko sendiri sebesar <span class="font-bold text-gray-800">Rp 300.000 per kejadian/titik kerusakan</span> sesuai aturan standar asuransi Indonesia.</p>
                        </div>
                        <div class="border-l-4 border-amber-500 bg-amber-50/50 p-4 rounded-r-lg">
                            <strong class="text-gray-800 block mb-1">Kerusakan Fatal & Kelalaian</strong>
                            <p class="text-gray-600 text-sm">Kerusakan total yang diakibatkan oleh kelalaian fatal (seperti berkendara di bawah pengaruh alkohol, menerjang banjir secara sengaja, atau dikemudikan oleh orang lain di luar penyewa terdaftar) sepenuhnya menjadi tanggung jawab penyewa secara mutlak.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-red-600 mb-6 flex items-center gap-3">
                        <span>03.</span> Larangan Keras Penggunaan Unit
                    </h2>
                    <p class="text-gray-600 mb-4">Pelanggaran terhadap poin-poin di bawah ini akan dikenakan sanksi hukum pidana dan denda administratif berat:</p>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 font-bold text-sm border-b border-gray-200">
                                <th class="p-3">Tindakan Pelanggaran</th>
                                <th class="p-3">Status Hukum & Konsekuensi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            <tr>
                                <td class="p-3 font-semibold text-gray-800">Menggadaikan atau Menjual Unit</td>
                                <td class="p-3 text-red-600 font-medium">Tindak Pidana Penggelapan (Pasal 372 KUHP)</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold text-gray-800">Pindah Tangan Sewa Tanpa Izin</td>
                                <td class="p-3">Pembatalan kontrak sewa sepihak + Denda administratif</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-semibold text-gray-800">Menggunakan untuk Balap Liar / Kriminal</td>
                                <td class="p-3 text-red-600 font-medium">Penyitaan Unit & Penyerahan Kasus ke Pihak Kepolisian</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="text-[#007bff]">04.</span> Kebijakan Waktu & Bahan Bakar (BBM)
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-5 border border-gray-100 rounded-xl bg-gray-50/50">
                            <strong class="text-gray-800 block mb-2">⏱ Keterlambatan (Overtime)</strong>
                            <p class="text-gray-600 text-sm">Batas toleransi pengembalian adalah 15 menit. Keterlambatan lebih dari batas tersebut akan dikenakan denda sebesar <span class="font-bold text-gray-800">10% per jam</span> dari harga sewa harian armada yang bersangkutan.</p>
                        </div>
                        <div class="p-5 border border-gray-100 rounded-xl bg-gray-50/50">
                            <strong class="text-gray-800 block mb-2">⛽ Aturan Bahan Bakar</strong>
                            <p class="text-gray-600 text-sm">RentalKu menerapkan aturan <span class="font-bold text-gray-800">"Bar to Bar"</span>. Armada wajib dikembalikan dengan volume indikator bahan bakar yang sama persis seperti pada awal masa penyerahan unit.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-6 sticky top-24">
                <div class="bg-gray-900 text-white p-8 rounded-2xl shadow-lg">
                    <h3 class="text-xl font-bold mb-3">Butuh Bantuan Lebih Lanjut?</h3>
                    <p class="text-gray-400 text-sm mb-6">Jika ada poin peraturan atau rincian jaminan asuransi yang kurang jelas, tim layanan pelanggan kami siap membantu Anda 24/7.</p>
                    
                    <div class="space-y-3">
                        <a href="https://wa.me/6285967972691?text=Halo%20Admin%20RentalKu,%20saya%20mau%20tanya%20tentang%20asuransi" 
   target="_blank" 
   class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-xl transition">
    📞 Hubungi Customer Care
</a>
                        <a href="{{ route('home') }}" class="block w-full bg-transparent hover:bg-white/10 text-white text-center font-bold py-3 rounded-xl border border-white/20 transition">
                            📅 Kembali ke Beranda
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <span class="text-3xl block mb-2">🔒</span>
                    <strong class="text-gray-800 block text-sm mb-1">Transaksi Terjamin Aman</strong>
                    <p class="text-gray-500 text-xs">Seluruh armada kami dilengkapi dengan GPS Tracker demi aspek keamanan bersama selama masa sewa.</p>
                </div>
            </div>

        </div>
    </section>
@endsection