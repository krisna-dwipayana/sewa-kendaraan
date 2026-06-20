<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KendaraanController; // <-- Ini wajib ada agar controllernya dipanggil
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); // <-- Rute bawaan ditutup di sini

// Rute baru ditaruh di LUAR kurung di atas

Route::get('/katalog', [KendaraanController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

