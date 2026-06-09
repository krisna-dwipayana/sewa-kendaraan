<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Sewa Lu - RentalKu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/katalog" class="text-xl font-bold text-blue-600 tracking-wider">RentalKu</a>
            <a href="/katalog" class="text-sm text-gray-500 hover:text-gray-800 transition">← Kembali ke Katalog</a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 py-12">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Riwayat Penyewaan Lu</h2>
            <p class="text-gray-500 mt-1">Pantau semua status pesanan rental motor lu di sini cuy.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Armada</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Durasi Sewa</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Bayar</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($transaksis as $t)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-5">
                                    <div class="font-bold text-gray-800">{{ $t->kendaraan->nama_kendaraan }}</div>
                                    <div class="text-xs text-gray-400 uppercase tracking-wider mt-0.5">{{ $t->kendaraan->plat_nomor }}</div>
                                </td>
                                <td class="px-6 py-5 text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($t->tanggal_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($t->tanggal_selesai)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-5">
                                    <span class="font-bold text-gray-900">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $t->status_transaksi == 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $t->status_transaksi == 'Berjalan' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $t->status_transaksi == 'Selesai' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $t->status_transaksi == 'Batal' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ $t->status_transaksi }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-400 text-sm font-medium">
                                    Lu belum pernah sewa armada nih cuy. Yuk booking sekarang!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>