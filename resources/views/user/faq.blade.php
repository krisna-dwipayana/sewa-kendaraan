@extends('layouts.user')

@section('content')
    <section class="bg-[#007bff] text-white py-20 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Frequently Asked Questions</h1>
            <p class="text-lg text-blue-100">Jawaban cepat untuk pertanyaan yang paling sering diajukan oleh pelanggan setia RentalKu.</p>
        </div>
    </section>

    <section class="bg-gray-50 py-16 px-6 min-h-[60vh]">
        <div class="max-w-4xl mx-auto">

            {{-- =============================== --}}
            {{-- KATEGORI 1: SYARAT & KETENTUAN  --}}
            {{-- =============================== --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                    <span class="text-[#007bff]">📋</span> Syarat & Ketentuan Sewa
                </h2>
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apa saja syarat untuk sewa lepas kunci?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Penyewa wajib memberikan jaminan berupa <strong>E-KTP asli</strong>, menunjukkan <strong>SIM A</strong> (untuk mobil) atau <strong>SIM C</strong> (untuk motor) yang masih aktif, serta mengisi dan menandatangani formulir persetujuan sewa. Dalam beberapa kasus, kami mungkin meminta dokumen tambahan seperti Kartu Keluarga atau ID Karyawan/Mahasiswa untuk verifikasi.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Berapa usia minimum untuk menyewa kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Usia minimum penyewa adalah <strong>17 tahun untuk motor</strong> dan <strong>21 tahun untuk mobil</strong>, dengan syarat sudah memiliki SIM yang sah dan masih berlaku. Penyewa berusia di bawah 25 tahun mungkin dikenakan deposit tambahan sebagai jaminan. Kami berhak menolak penyewaan jika penyewa dinilai belum cukup berpengalaman dalam berkendara.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah WNA (Warga Negara Asing) bisa menyewa kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                WNA diperbolehkan menyewa kendaraan dengan syarat memiliki <strong>Paspor aktif</strong>, <strong>SIM Internasional (International Driving Permit)</strong> yang masih berlaku, serta <strong>KITAS/KITAP</strong> bagi yang berdomisili di Indonesia. Sesuai peraturan Kepolisian RI, SIM dari negara asal tidak dapat digunakan sebagai pengganti SIM Internasional di Indonesia.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah saya bisa menyewa kendaraan dengan supir?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Tentu bisa! Kami menyediakan layanan <strong>"Sewa Plus Supir"</strong> khusus untuk armada Mobil dan Kendaraan Wisata. Supir kami berpengalaman dan menguasai area Jabodetabek serta rute wisata populer. Tarif harian supir belum termasuk biaya makan dan penginapan (jika rute mengharuskan menginap di luar kota).
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah ada biaya deposit/jaminan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kami tidak menerapkan deposit uang tunai. Sebagai gantinya, penyewa cukup menyerahkan <strong>E-KTP asli</strong> yang akan dikembalikan saat kendaraan dikembalikan dalam kondisi baik. Untuk penyewaan armada khusus (bus, kendaraan wisata) atau periode panjang di atas 7 hari, mungkin diperlukan deposit tambahan yang akan dikomunikasikan sebelumnya.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- =============================== --}}
            {{-- KATEGORI 2: PEMESANAN & PEMBAYARAN --}}
            {{-- =============================== --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                    <span class="text-[#007bff]">💳</span> Pemesanan & Pembayaran
                </h2>
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bagaimana cara melakukan pemesanan kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Pemesanan dapat dilakukan melalui tiga cara: (1) <strong>Online</strong> melalui website ini dengan memilih kendaraan dan mengisi form booking, (2) <strong>WhatsApp</strong> ke nomor admin kami yang tertera di halaman Kontak, atau (3) <strong>Langsung datang</strong> ke kantor kami. Disarankan melakukan pemesanan minimal <strong>H-1</strong> sebelum tanggal pengambilan agar unit dapat dipersiapkan dengan baik.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Metode pembayaran apa saja yang diterima?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kami menerima berbagai metode pembayaran: <strong>Tunai (Cash)</strong>, <strong>Transfer Bank</strong> (BCA, BRI, BNI, Mandiri), dan <strong>E-Wallet</strong> (GoPay, OVO, Dana, ShopeePay). Untuk pembayaran via transfer, harap konfirmasi pembayaran melalui WhatsApp admin beserta bukti transfer agar pemesanan Anda segera dikonfirmasi.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah bisa membatalkan atau mengubah jadwal pemesanan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Pembatalan atau perubahan jadwal dapat dilakukan dengan menghubungi admin kami. Perubahan jadwal <strong>gratis</strong> jika dilakukan minimal <strong>24 jam sebelum</strong> waktu pengambilan. Pembatalan di bawah 24 jam sebelum pengambilan dapat dikenakan biaya administrasi. Pembatalan mendadak (kurang dari 2 jam) tidak mendapatkan pengembalian biaya yang sudah dibayarkan.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah bisa memperpanjang masa sewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Perpanjangan sewa dapat dilakukan dengan menghubungi admin kami <strong>minimal 3 jam sebelum</strong> batas waktu pengembalian, disesuaikan dengan ketersediaan unit. Biaya perpanjangan dihitung berdasarkan tarif sewa harian yang berlaku. Jika tidak mengajukan perpanjangan namun kendaraan terlambat dikembalikan, akan dikenakan biaya <em>overtime</em>.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================================ --}}
            {{-- KATEGORI 3: PENGGUNAAN KENDARAAN --}}
            {{-- ================================ --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                    <span class="text-[#007bff]">🚗</span> Penggunaan Kendaraan
                </h2>
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bagaimana kebijakan terkait bahan bakar (BBM)?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kami menerapkan sistem <strong>Bar-to-Bar</strong>. Artinya, kendaraan harus dikembalikan dengan indikator bensin yang sama persis seperti saat kendaraan diambil. Kondisi awal BBM akan didokumentasikan bersama saat serah terima. Jika bensin saat pengembalian lebih sedikit, akan dikenakan biaya penggantian BBM sesuai harga SPBU yang berlaku.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bolehkah kendaraan dibawa ke luar kota atau luar pulau?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Armada roda empat dan wisata bebas digunakan untuk area <strong>Jabodetabek</strong> maupun luar kota di dalam <strong>Pulau Jawa</strong> tanpa biaya tambahan. Penggunaan ke luar Pulau Jawa wajib diinformasikan terlebih dahulu untuk penyesuaian asuransi dan administrasi. Untuk armada motor, penggunaan dibatasi hanya di area <strong>Jabodetabek</strong>.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apa yang terjadi jika saya terlambat mengembalikan kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kami memberikan batas toleransi maksimal <strong>15 menit</strong>. Apabila pengembalian melewati batas tersebut, akan dikenakan biaya <em>overtime</em> sebesar <strong>10% dari tarif sewa harian untuk setiap jam keterlambatan</strong>. Jika keterlambatan melebihi 6 jam, akan dihitung sebagai tambahan satu hari penuh.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah kendaraan boleh dikemudikan oleh orang lain selain penyewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kendaraan hanya boleh dikemudikan oleh penyewa yang namanya tercantum dalam perjanjian sewa, kecuali ada perjanjian tertulis tambahan untuk pengemudi kedua (<em>additional driver</em>). Pengemudi tambahan wajib memenuhi syarat yang sama (memiliki SIM aktif dan usia minimum) serta mendaftarkan diri sebelum masa sewa dimulai.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah diperbolehkan merokok di dalam kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                <strong>Seluruh armada kami adalah kawasan bebas rokok.</strong> Merokok di dalam kendaraan dilarang keras dan akan dikenakan denda kebersihan minimum <strong>Rp 200.000</strong> jika ditemukan bau rokok, abu, atau bekas terbakar di interior kendaraan saat pengembalian. Hal ini diberlakukan demi kenyamanan penyewa berikutnya.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================================ --}}
            {{-- KATEGORI 4: KERUSAKAN & ASURANSI --}}
            {{-- ================================ --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                    <span class="text-[#007bff]">🛡️</span> Kerusakan & Asuransi
                </h2>
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apa yang harus dilakukan jika terjadi kecelakaan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Jika terjadi kecelakaan, segera lakukan langkah berikut: (1) Pastikan keselamatan diri dan penumpang, (2) <strong>Hubungi admin RentalKu segera</strong> melalui nomor darurat kami, (3) <strong>Buat laporan kepolisian (LP)</strong> di kantor polisi terdekat — laporan polisi wajib ada untuk proses klaim asuransi, (4) Dokumentasikan kondisi kendaraan dengan foto. Jangan pindahkan kendaraan dari TKP sebelum didokumentasikan.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bagaimana jika terjadi kerusakan ringan pada kendaraan?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Penyewa bertanggung jawab penuh atas kerusakan yang terjadi selama masa sewa. Kondisi awal kendaraan didokumentasikan bersama saat serah terima. Kerusakan ringan seperti lecet, penyok kecil, atau kaca retak akan diestimasi biaya perbaikannya oleh bengkel rekanan kami. Biaya tersebut wajib dilunasi sebelum atau saat pengembalian kendaraan.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah kendaraan sudah tercover asuransi?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Ya, seluruh armada kami telah diasuransikan. Namun penyewa tetap menanggung biaya <strong>risiko sendiri (deductible)</strong> sesuai polis yang berlaku jika terjadi klaim. Asuransi tidak berlaku untuk kerusakan akibat kelalaian berat seperti berkendara dalam pengaruh alkohol/narkoba, atau penggunaan di luar ketentuan perjanjian sewa. Detail polis dapat ditanyakan ke admin kami.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bagaimana jika kendaraan mogok atau mengalami masalah teknis?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Segera hubungi admin RentalKu melalui nomor darurat kami. Jika kerusakan bukan akibat kelalaian penyewa (kerusakan mesin, ban bocor bawaan, dll.), kami akan mengirimkan teknisi atau kendaraan pengganti tanpa biaya tambahan. Jika masalah terjadi akibat penggunaan yang tidak sesuai ketentuan, biaya perbaikan menjadi tanggung jawab penyewa.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apa yang terjadi jika kendaraan hilang saat masa sewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Kehilangan kendaraan wajib segera dilaporkan ke polisi dan RentalKu. Penyewa wajib menyerahkan <strong>Laporan Polisi (LP)</strong> sebagai syarat klaim asuransi. Jika terbukti terjadi karena kelalaian atau kesengajaan penyewa, penyewa bertanggung jawab atas penggantian nilai kendaraan sesuai harga pasar yang berlaku.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================================ --}}
            {{-- KATEGORI 5: LARANGAN             --}}
            {{-- ================================ --}}
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                    <span class="text-[#007bff]">🚫</span> Larangan & Hal yang Perlu Diperhatikan
                </h2>
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apa saja yang dilarang selama masa sewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Selama masa sewa, penyewa dilarang keras: (1) Menyewakan kembali kendaraan kepada pihak lain (<em>sub-rent</em>), (2) Menggunakan kendaraan untuk kegiatan ilegal, (3) Berkendara dalam pengaruh alkohol atau narkoba, (4) Menggunakan kendaraan untuk balapan atau uji kecepatan, (5) Memodifikasi kendaraan dalam bentuk apapun, (6) Mengangkut barang melebihi kapasitas kendaraan. Pelanggaran dapat berakibat pemutusan kontrak sewa dan tuntutan hukum.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Apakah ada sanksi jika melanggar ketentuan sewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Pelanggaran terhadap ketentuan sewa dapat mengakibatkan: pemutusan kontrak sewa secara sepihak, pencabutan hak sewa tanpa pengembalian biaya, denda sesuai jenis pelanggaran, pemblokiran akun di platform kami, serta tindakan hukum lebih lanjut apabila pelanggaran menyebabkan kerugian material yang signifikan bagi RentalKu.
                            </p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button onclick="toggleFaq(this)" class="faq-btn w-full text-left px-6 py-4 bg-white hover:bg-gray-50 flex justify-between items-center focus:outline-none transition-colors">
                            <span class="font-bold text-gray-800 text-lg">Bagaimana dengan tilang atau pelanggaran lalu lintas selama masa sewa?</span>
                            <span class="text-[#007bff] text-2xl font-light icon" style="transition: transform 0.3s ease, color 0.3s ease;">+</span>
                        </button>
                        <div class="faq-content bg-gray-50" style="max-height: 0px; overflow: hidden; transition: max-height 0.35s ease;">
                            <p class="px-6 py-4 text-gray-600 border-t border-gray-200">
                                Segala pelanggaran lalu lintas (tilang manual maupun <strong>ETLE/tilang elektronik</strong>) yang terjadi selama masa sewa sepenuhnya menjadi tanggung jawab penyewa. Jika ada tagihan tilang ETLE yang dikirim ke RentalKu setelah masa sewa berakhir, biaya denda ditambah biaya administrasi sebesar <strong>Rp 50.000</strong> akan ditagihkan kepada penyewa.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- CTA --}}
            <div class="mt-4 text-center p-6 bg-blue-50 rounded-xl border border-blue-100">
                <p class="text-gray-700 mb-4">Pertanyaan Anda belum terjawab di sini?</p>
                <a href="https://wa.me/6285967972691?text=Halo%20Admin%20RentalKu,%20saya%20punya%20pertanyaan%20soal%20FAQ" 
   target="_blank" 
   class="inline-block bg-gray-800 hover:bg-black text-white px-8 py-3 rounded-lg transition shadow-md font-semibold">
    Hubungi Customer Service
</a>
            </div>

        </div>
    </section>

    <script>
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.icon');
            const isOpen = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';

            // Tutup semua FAQ lain
            document.querySelectorAll('.faq-btn').forEach((btn) => {
                if (btn !== button) {
                    const otherContent = btn.nextElementSibling;
                    const otherIcon = btn.querySelector('.icon');
                    otherContent.style.maxHeight = '0px';
                    otherIcon.textContent = '+';
                    otherIcon.style.color = '#007bff';
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle FAQ yang diklik
            if (isOpen) {
                content.style.maxHeight = '0px';
                icon.textContent = '+';
                icon.style.color = '#007bff';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.textContent = '✕';
                icon.style.color = '#ef4444';
                icon.style.transform = 'rotate(90deg)';
            }
        }
    </script>
@endsection