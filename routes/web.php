<?php

use App\Models\Kendaraan;
use App\Models\Transaksi;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// HOME PAGE
Route::get('/', function () {
    $kendaraans = \App\Models\Kendaraan::where('status', 'Tersedia')->get();
    return view('user.home', compact('kendaraans')); 
})->name('home');

// DASHBOARD REDIRECT
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.katalog');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTHENTICATED ROUTES (Profil & Sewa untuk User Biasa)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // RUTE SEWA DIPINDAHKAN KE SINI (Harus Login, tapi TIDAK harus Admin)
    Route::get('/sewa/{id}', [KatalogController::class, 'sewa'])->name('user.sewa');
    Route::post('/sewa/{id}', [KatalogController::class, 'prosesSewa'])->name('user.proses_sewa');
    Route::get('/riwayat', [KatalogController::class, 'riwayat'])->name('user.riwayat');
});

// KATALOG & HALAMAN PUBLIK (Bebas diakses tanpa login)
Route::get('/katalog', [KatalogController::class, 'index'])->name('user.katalog');
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show']);
Route::get('/katalog/detail/{id}', [KatalogController::class, 'show'])->name('user.detail');

// STATIC PAGES
Route::get('/asuransi', function () { return view('user.asuransi'); })->name('user.asuransi');
Route::get('/tentang-kami', function () { return view('user.tentang-kami'); })->name('user.tentang-kami');
Route::get('/faq', function () { return view('user.faq'); })->name('user.faq');
Route::get('/kontak', function () { return view('user.kontak'); })->name('user.kontak');


// ADMIN ROUTES (Ruangan VIP Khusus Admin)
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        $total_pendapatan = Transaksi::where('status_transaksi', 'Selesai')->sum('total_harga');
        $total_armada = Kendaraan::count();
        $transaksi_aktif = Transaksi::whereIn('status_transaksi', ['Menunggu', 'Berjalan'])->count();
        
        return view('admin.dashboard', compact('total_pendapatan', 'total_armada', 'transaksi_aktif')); 
    })->name('admin.dashboard');

    // Kendaraan
    Route::get('/admin/kendaraan', [KendaraanController::class, 'index'])->name('admin.kendaraan');
    Route::get('/admin/kendaraan/create', [KendaraanController::class, 'create'])->name('admin.kendaraan.create');
    Route::post('/admin/kendaraan/store', [KendaraanController::class, 'store'])->name('admin.kendaraan.store');
    Route::get('/admin/kendaraan/{id}/edit', [KendaraanController::class, 'edit'])->name('admin.kendaraan.edit');
    Route::put('/admin/kendaraan/{id}', [KendaraanController::class, 'update'])->name('admin.kendaraan.update');
    Route::delete('/admin/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('admin.kendaraan.destroy');
    
    // Transaksi & Laporan
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::patch('/admin/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('admin.transaksi.status');
    Route::get('/admin/laporan', [\App\Http\Controllers\LaporanController::class, 'index'])->name('admin.laporan');
    
    // NOTE: Rute /sewa nyasar di sini SUDAH DIHAPUS.
});

require __DIR__.'/auth.php';