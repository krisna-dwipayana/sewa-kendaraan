<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan - RentalKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS Khusus buat nyembunyikan tombol saat kertas di-print */
        @media print {
            .no-print { display: none !important; }
            body { background-color: white; }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 p-8">

    <div class="max-w-5xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
        <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-medium shadow-sm transition">
            🖨️ Cetak PDF / Print
        </button>
    </div>

    <div class="max-w-5xl mx-auto bg-white p-10 border border-gray-200 shadow-sm rounded-xl">
        <div class="text-center border-b-2 border-gray-800 pb-4 mb-6">
            <h1 class="text-3xl font-extrabold uppercase tracking-wider text-blue-700">Laporan Pendapatan RentalKu</h1>
            <p class="text-gray-500 mt-1">Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}</p>
        </div>

        <table class="w-full text-left border-collapse mb-8">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border border-gray-300 px-4 py-3 text-sm">Nama Pelanggan</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm">Armada</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm">Durasi Sewa</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm text-right">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $t)
                    <tr>
                        <td class="border border-gray-300 px-4 py-3 text-sm">{{ $t->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-sm">{{ $t->kendaraan->nama_kendaraan }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-sm">
                            {{ \Carbon\Carbon::parse($t->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($t->tanggal_selesai)->format('d/m/Y') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-sm text-right font-medium">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-300 px-4 py-6 text-center text-gray-500 italic">Belum ada transaksi yang selesai.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr class="bg-blue-50 font-bold text-gray-900">
                    <td colspan="3" class="border border-gray-300 px-4 py-3 text-right">TOTAL PENDAPATAN :</td>
                    <td class="border border-gray-300 px-4 py-3 text-right text-blue-700">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        
        <div class="mt-12 flex justify-end">
            <div class="text-center">
                <p class="text-sm text-gray-600 mb-16">Mengetahui, Admin RentalKu</p>
                <p class="font-bold border-b border-gray-800 pb-1">Krisna Dwipayana</p>
            </div>
        </div>
    </div>

</body>
</html>