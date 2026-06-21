<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\Api\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (Bisa diakses siapa saja tanpa login) ---
Route::get('/katalog', [KendaraanController::class, 'apiIndex']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// --- RUTE TERLINDUNGI (Wajib membawa Token Sanctum) ---
Route::middleware('auth:sanctum')->group(function () {
    
    // Rute bawaan untuk mengambil data profil user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rute Autentikasi
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Rute Transaksi / Pesanan
    Route::post('/transaksi', [TransaksiController::class, 'store']); // Untuk membuat pesanan baru
    Route::get('/transaksi/riwayat', [TransaksiController::class, 'riwayat']); // Untuk melihat daftar pesanan
    
});