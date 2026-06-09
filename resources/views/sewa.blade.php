<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa - {{ $kendaraan->nama_kendaraan }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    <div class="max-w-md mx-auto px-4 py-12">
        <div class="mb-6">
            <a href="/katalog" class="text-sm text-blue-600 hover:underline">← Kembali ke Katalog</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Form Penyewaan</h2>
            <p class="text-gray-500 text-sm mb-6">Silakan tentukan durasi sewa armada lu, cuy.</p>

            <div class="bg-blue-50 p-4 rounded-xl flex items-center justify-between mb-6">
                <div>
                    <h4 class="font-bold text-gray-800">{{ $kendaraan->nama_kendaraan }}</h4>
                    <span class="text-xs text-gray-500 uppercase">{{ $kendaraan->plat_nomor }}</span>
                </div>
                <div class="text-right">
                    <span class="text-xs text-gray-400 block">Harga/Hari</span>
                    <span class="font-bold text-blue-600">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('user.proses_sewa', $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai Sewa</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai Sewa</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="pt-2 border-t border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload KTP / SIM (Wajib)</label>
                        <input type="file" name="foto_identitas" required accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Transfer (Wajib)</label>
                        <p class="text-xs text-gray-500 mb-2">Transfer total harga ke: <strong>BCA 1234567890 a.n RentalKu</strong></p>
                        <input type="file" name="bukti_pembayaran" required accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-4 mb-6 flex justify-between items-center">
                    <div>
                        <span class="text-sm font-medium text-gray-700">Estimasi Total Bayar:</span>
                        <span id="durasi_teks" class="text-xs text-gray-400 block">0 Hari sewa</span>
                    </div>
                    <span id="total_harga_view" class="text-2xl font-extrabold text-blue-600">Rp 0</span>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-sm transition">
                    Kirim & Booking Sekarang
                </button>
            </form>
        </div>
    </div>

    <script>
        const hargaPerHari = {{ $kendaraan->harga_sewa }};
        const inputMulai = document.getElementById('tanggal_mulai');
        const inputSelesai = document.getElementById('tanggal_selesai');
        const totalHargaView = document.getElementById('total_harga_view');
        const durasiTeks = document.getElementById('durasi_teks');

        function hitungTotal() {
            if (inputMulai.value && inputSelesai.value) {
                const tglMulai = new Date(inputMulai.value);
                const tglSelesai = new Date(inputSelesai.value);
                
                // Hitung selisih hari
                const selisihWaktu = tglSelesai.getTime() - tglMulai.getTime();
                let selisihHari = Math.ceil(selisihWaktu / (1000 * 3600 * 24));
                
                if (selisihHari < 0) selisihHari = 0;
                if (selisihHari === 0 && inputMulai.value === inputSelesai.value) selisihHari = 1;

                const totalHarga = selisihHari * hargaPerHari;
                
                // Tampilkan ke layar dengan format mata uang rupiah
                durasiTeks.innerText = `${selisihHari} Hari sewa`;
                totalHargaView.innerText = 'Rp ' + totalHarga.toLocaleString('id-ID');
            }
        }

        inputMulai.addEventListener('change', hitungTotal);
        inputSelesai.addEventListener('change', hitungTotal);
    </script>
</body>
</html>