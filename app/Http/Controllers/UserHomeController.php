<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan; // WAJIB TAMBAHKAN INI DI ATAS

class UserHomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data kendaraan beserta kategorinya
        // Hanya yang statusnya 'Tersedia' yang akan ditampilkan di depan
        $kendaraans = Kendaraan::with('kategori')->where('status', 'Tersedia')->latest()->get();

        return view('user.home', compact('kendaraans'));
    }


    // Kategori Motor
    public function motor()
    {
        $title = 'Sewa Motor';
        $kendaraans = Kendaraan::with('kategori')->whereHas('kategori', function($q) {
            $q->where('nama_kategori', 'like', '%Roda Dua%'); // Mencari kategori yg ada kata "Roda Dua"
        })->where('status', 'Tersedia')->latest()->get();
        
        return view('user.kategori', compact('kendaraans', 'title'));
    }

    // Kategori Mobil
    public function mobil()
    {
        $title = 'Sewa Mobil';
        $kendaraans = Kendaraan::with('kategori')->whereHas('kategori', function($q) {
            $q->where('nama_kategori', 'like', '%Roda Empat%'); // Mencari kategori yg ada kata "Roda Empat"
        })->where('status', 'Tersedia')->latest()->get();
        
        return view('user.kategori', compact('kendaraans', 'title'));
    }

    // Kategori Wisata
    public function wisata()
    {
        $title = 'Sewa Kendaraan Wisata & Khusus';
        $kendaraans = Kendaraan::with('kategori')->whereHas('kategori', function($q) {
            $q->where('nama_kategori', 'like', '%Wisata%'); // Mencari kategori yg ada kata "Wisata"
        })->where('status', 'Tersedia')->latest()->get();
        
        return view('user.kategori', compact('kendaraans', 'title'));
    }

    // Halaman Asuransi & Ketentuan Peraturan Sewa
    public function asuransi()
    {
        return view('user.asuransi');
    }

    // Halaman Tentang Kami
    public function tentangKami()
    {
        return view('user.tentang-kami');
    }

    // Halaman FAQ (Pertanyaan yang Sering Diajukan)
    public function faq()
    {
        return view('user.faq');
    }

    // Halaman Kontak
    public function kontak()
    {
        return view('user.kontak');
    }
}