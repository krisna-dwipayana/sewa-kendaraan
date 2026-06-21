<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan; // Wajib dipanggil biar bisa ngobrol sama database
use Illuminate\Http\Request;
use App\Models\Kategori;

class KendaraanController extends Controller
{
    // 1. Nampilin daftar kendaraan di tabel
    public function index()
    {
        $kendaraans = Kendaraan::all(); // Ambil semua data dari database
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    // --- FUNGSI KHUSUS UNTUK API FLUTTER ---
    public function apiIndex()
    {
        // Mengambil semua data kendaraan beserta relasi kategori-nya
        // (Pastikan nama model 'Kendaraan' sesuai dengan yang Anda gunakan)
        $kendaraan = \App\Models\Kendaraan::with('kategori')->get();

        // Kembalikan data dalam format JSON murni, bukan view/HTML
        return response()->json([
            'status' => 'success',
            'message' => 'Data katalog berhasil diambil',
            'data' => $kendaraan
        ], 200);
    }
    // 2. Nampilin halaman form tambah kendaraan
    public function create()
{
    // Ambil semua data kategori dari database buat ditaruh di dropdown
    $kategoris = Kategori::all(); 
    
    // Buka form create dan bawa data kategorinya
    return view('admin.kendaraan.create', compact('kategoris'));
}

    // 3. Proses nyimpen data dari form ke database
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk (Pastiin semuanya diisi dan file-nya beneran gambar)
        $request->validate([
            'kategori_id' => 'required',
            'nama_kendaraan' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'harga_sewa' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max ukuran foto 2MB
        ]);

        // 2. Siapin variabel buat nampung path/alamat foto
        $imagePath = null;

        // 3. Kalau admin nge-upload foto, simpan fotonya ke folder 'public/storage/kendaraan'
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('kendaraan', 'public');
        }

        // 4. Masukin semua data ke database
        \App\Models\Kendaraan::create([
            'kategori_id' => $request->kategori_id,
            'nama_kendaraan' => $request->nama_kendaraan,
            'plat_nomor' => strtoupper($request->plat_nomor), // Maksa plat nomor jadi huruf besar semua
            'kapasitas' => $request->kapasitas,
            'harga_sewa' => $request->harga_sewa,
            'gambar' => $imagePath,
            'status' => 'Tersedia', // Otomatis status awal "Tersedia"
        ]);

        // 5. Tendang balik ke halaman Kelola Armada bawa pesan sukses
        return redirect()->route('admin.kendaraan')->with('success', 'Mantap cuy! Kendaraan baru berhasil ditambahkan.');
    }

// 4. Nampilin form edit data kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id); // Cari ID-nya, kalau gak ada langsung error 404
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    // 5. Proses nyimpen perubahan datanya
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'nama_kendaraan' => 'required|string',
            'plat_nomor' => 'required|string|unique:kendaraans,plat_nomor,' . $id, // Abaikan pengecekan unik untuk mobil ini sendiri
            'kapasitas' => 'required|numeric',
            'harga_sewa' => 'required|numeric',
            'status' => 'required|in:Tersedia,Disewa'
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('admin.kendaraan')->with('success', 'Data armada berhasil diperbarui cuy!');
    }

    // 6. Menghapus data kendaraan dari database
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('admin.kendaraan')->with('success', 'Armada berhasil ditendang dari database!');
    }
}