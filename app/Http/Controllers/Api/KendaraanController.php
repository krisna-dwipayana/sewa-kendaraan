<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan; // Memanggil model Kendaraan

class KendaraanController extends Controller
{
    public function index()
    {
        // 1. Ambil data kendaraan dari database (beserta data relasi kategorinya jika ada)
        $kendaraan = Kendaraan::with('kategori')
                              ->where('status', 'Tersedia')
                              ->get();

        // 2. Jika data kosong
        if ($kendaraan->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan',
                'data'    => null
            ], 404); // 404 = Not Found
        }

        // 3. Jika data ada, kembalikan dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar kendaraan berhasil diambil',
            'data'    => $kendaraan
        ], 200); // 200 = OK
    }
}