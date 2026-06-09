<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung total semua armada
        $totalArmada = Kendaraan::count();

        // 2. Hitung total semua transaksi yang masuk
        $totalTransaksi = Transaksi::count();

        // 3. Hitung total duit masuk (hanya dari transaksi yang statusnya 'Selesai')
        $totalPendapatan = Transaksi::where('status_transaksi', 'Selesai')->sum('total_harga');

        return view('dashboard', compact('totalArmada', 'totalTransaksi', 'totalPendapatan'));
    }
}