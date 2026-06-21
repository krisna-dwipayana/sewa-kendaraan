<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi; // Sesuaikan jika nama Model Anda berbeda (misal: Sewa)
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Data dari Flutter
        $validator = Validator::make($request->all(), [
            'kendaraan_id' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'total_harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pesanan tidak lengkap atau tidak valid.',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Simpan Pesanan ke Database PostgreSQL
        try {
            $transaksi = Transaksi::create([
                // Mengambil ID User secara otomatis dari Token Sanctum yang sedang aktif
                'user_id' => $request->user()->id, 
                'kendaraan_id' => $request->kendaraan_id,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'total_harga' => $request->total_harga,
                //'status' => 'Menunggu Pembayaran' // Status bawaan saat baru pesan
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Pesanan berhasil dibuat!',
                'data' => $transaksi
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // $e->getMessage() akan membantu kita melihat jika ada error dari database
                'message' => 'Gagal membuat pesanan: ' . $e->getMessage() 
            ], 500);
        }
    }

    // --- FUNGSI MENGAMBIL RIWAYAT PESANAN ---
    public function riwayat(Request $request)
    {
        // 1. Ambil ID user yang sedang login dari token
        $userId = $request->user()->id;

        // 2. Cari semua transaksi milik user tersebut, urutkan dari yang terbaru
        $riwayat = Transaksi::where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // 3. Menyelipkan data spesifikasi kendaraan ke dalam setiap transaksi
        // (Cara aman jika Anda belum mengatur relasi antar Model di Laravel)
        foreach ($riwayat as $item) {
            $item->kendaraan = \App\Models\Kendaraan::find($item->kendaraan_id);
        }

        // 4. Kembalikan dalam format JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil riwayat pesanan',
            'data' => $riwayat
        ], 200);
    }   
}