<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Kita hanya menampilkan transaksi yang sudah upload bukti transfer 
        // dan statusnya masih 'Menunggu' atau 'Proses Verifikasi'
        $pembayarans = Transaksi::with(['user', 'kendaraan'])
            ->whereNotNull('bukti_transfer')
            ->whereIn('status_transaksi', ['Menunggu', 'Proses'])
            ->latest()
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function konfirmasi($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // 1. Update status transaksi jadi Berjalan (karena sudah lunas)
        $transaksi->update([
            'status_transaksi' => 'Berjalan'
        ]);

        // 2. Otomatisasi: Ubah status kendaraan jadi Disewa
        $transaksi->kendaraan->update([
            'status' => 'Disewa'
        ]);

        return redirect()->back()->with('success', 'Pembayaran sah! Status sewa kini AKTIF dan armada telah ditandai disewa.');
    }
}