<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi yang statusnya Selesai aja (buat laporan pendapatan)
        $transaksis = Transaksi::with(['user', 'kendaraan'])
                        ->where('status_transaksi', 'Selesai')
                        ->latest()
                        ->get();
                        
        $total_pendapatan = $transaksis->sum('total_harga');

        return view('admin.laporan.index', compact('transaksis', 'total_pendapatan'));
    }
}