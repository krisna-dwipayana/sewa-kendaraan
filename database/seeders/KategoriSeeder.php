<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{                          // ← buka di baris 9
    public function run(): void
    {
        \App\Models\Kategori::insert([
            ['nama_kategori' => 'Roda Dua'],
            ['nama_kategori' => 'Roda Empat (Mobil)'],
            ['nama_kategori' => 'Kendaraan Wisata & Khusus'],
        ]);
    }
}                          // ← tutup class, tanpa titik koma