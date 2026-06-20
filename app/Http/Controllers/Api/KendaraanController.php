<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data kendaraan beserta relasi kategori-nya
        // Pastikan model Kendaraan sudah memiliki relasi 'kategori' yang terdefinisi
        $kendaraan = Kendaraan::with('kategori')->get();

        if ($kendaraan->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kendaraan tidak ditemukan.',
                'data' => null
            ], 404);
        }

        // Mengembalikan respons dalam format JSON standar
        return response()->json([
            'status' => 'success',
            'message' => 'Data katalog kendaraan berhasil diambil.',
            'data' => $kendaraan
        ], 200);
    }
}