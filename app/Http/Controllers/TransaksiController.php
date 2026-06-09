<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil data transaksi sekalian angkut data user & kendaraan yang bersangkutan
        $transaksis = Transaksi::with(['user', 'kendaraan'])->latest()->get();
        
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // 1. Update status transaksinya
        $transaksi->update([
            'status_transaksi' => $request->status
        ]);

        // 2. Logika otomatis buat status armandanya (Biar sinkron)
        if ($request->status == 'Berjalan') {
            $transaksi->kendaraan->update(['status' => 'Disewa']);
        } elseif ($request->status == 'Selesai' || $request->status == 'Batal') {
            $transaksi->kendaraan->update(['status' => 'Tersedia']);
        }

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui cuy!');
    }
}