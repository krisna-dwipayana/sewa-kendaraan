@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Form Booking {{ $kendaraan->nama_kendaraan }}</h2>
        
        <form action="{{ route('user.proses_sewa', $kendaraan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tanggal Mulai -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" required 
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                
                <!-- Tanggal Selesai -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" required 
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <!-- Upload Foto Identitas -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Identitas (KTP/SIM)</label>
                <input type="file" name="foto_identitas" required accept="image/*"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3">
            </div>

            <!-- Upload Bukti Pembayaran -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Pembayaran (Transfer)</label>
                <input type="file" name="bukti_pembayaran" required accept="image/*"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3">
            </div>

            <!-- Total Harga Display -->
            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                <p class="text-sm text-blue-600 font-semibold">Total Harga:</p>
                <h3 id="total-harga-display" class="text-3xl font-extrabold text-blue-900">Rp 0</h3>
                <input type="hidden" name="total_harga" id="total_harga" value="0">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition">
                Konfirmasi Sewa Sekarang
            </button>
        </form>
    </div>
</div>

<script>
    const inputMulai = document.getElementById('tanggal_mulai');
    const inputSelesai = document.getElementById('tanggal_selesai');
    const displayTotal = document.getElementById('total-harga-display');
    const inputTotal = document.getElementById('total_harga');
    const hargaPerHari = {{ $kendaraan->harga_sewa }};

    function hitungHarga() {
        if (inputMulai.value && inputSelesai.value) {
            const start = new Date(inputMulai.value);
            const end = new Date(inputSelesai.value);
            
            // Hitung selisih hari
            const diffTime = Math.abs(end - start);
            let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Minimal 1 hari
            if (diffDays === 0) diffDays = 1; 
            
            const total = diffDays * hargaPerHari;
            
            // Update tampilan
            displayTotal.innerText = 'Rp ' + total.toLocaleString('id-ID');
            inputTotal.value = total;
        }
    }

    inputMulai.addEventListener('change', hitungHarga);
    inputSelesai.addEventListener('change', hitungHarga);
</script>
@endsection