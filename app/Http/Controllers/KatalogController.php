<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    // ... di dalam KatalogController.php, ganti fungsi index dan tambahin show ...

public function index(Request $request)
{
    $keyword = $request->search;
    $kategori = $request->kategori;
    $min_price = $request->min_price;
    $max_price = $request->max_price;

    $kendaraans = Kendaraan::where('status', 'Tersedia')
        ->when($keyword, function ($query, $keyword) {
            return $query->where('nama_kendaraan', 'like', '%' . $keyword . '%');
        })
        ->when($kategori, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($q) use ($kategori) {
                $q->where('nama_kategori', $kategori);
            });
        })
        // Filter Harga
        ->when($min_price, function ($query, $min_price) {
            return $query->where('harga_sewa', '>=', $min_price);
        })
        ->when($max_price, function ($query, $max_price) {
            return $query->where('harga_sewa', '<=', $max_price);
        })
        ->latest()
        ->get();

    return view('katalog', compact('kendaraans'));
}

// Fungsi buat Halaman Detail
public function show($id)
{
    $kendaraan = Kendaraan::findOrFail($id);
    return view('detail', compact('kendaraan'));
}
    // FUNGSI MENAMPILKAN FORM SEWA
    public function sewa($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        
        // UDAH AKU HAPUS 'user.' NYA JUGA
        return view('sewa', compact('kendaraan'));
    }

    // FUNGSI PROSES SIMPAN TRANSAKSI KE DATABASE
    public function prosesSewa(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'foto_identitas' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);

        $mulai = Carbon::parse($request->tanggal_mulai);
        $selesai = Carbon::parse($request->tanggal_selesai);
        $durasi = $mulai->diffInDays($selesai);
        if ($durasi == 0) $durasi = 1; 
        $total_harga = $durasi * $kendaraan->harga_sewa;

        $fotoIdentitas = $request->file('foto_identitas');
        $namaIdentitas = time() . '_ktp.' . $fotoIdentitas->getClientOriginalExtension();
        $fotoIdentitas->move(public_path('uploads/identitas'), $namaIdentitas);

        $buktiBayar = $request->file('bukti_pembayaran');
        $namaBukti = time() . '_bukti.' . $buktiBayar->getClientOriginalExtension();
        $buktiBayar->move(public_path('uploads/pembayaran'), $namaBukti);

        Transaksi::create([
            'user_id' => auth()->id() ?? 1,
            'kendaraan_id' => $id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $total_harga,
            'status_transaksi' => 'Menunggu',
            'foto_identitas' => 'uploads/identitas/' . $namaIdentitas,
            'bukti_pembayaran' => 'uploads/pembayaran/' . $namaBukti,
        ]);

        return redirect()->route('user.riwayat');
    }

    // FUNGSI MENAMPILKAN RIWAYAT SEWA USER
    public function riwayat()
    {
        $transaksis = Transaksi::where('user_id', auth()->id())
                                ->with('kendaraan')
                                ->latest()
                                ->get();

        // UDAH AKU HAPUS 'user.' NYA
        return view('riwayat', compact('transaksis'));
    }


}