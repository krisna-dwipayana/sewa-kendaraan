<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KendaraanController; // <-- Ini wajib ada agar controllernya dipanggil

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); // <-- Rute bawaan ditutup di sini

// Rute baru ditaruh di LUAR kurung di atas
Route::get('/kendaraan', [KendaraanController::class, 'index']);