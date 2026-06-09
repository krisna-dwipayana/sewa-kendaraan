<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Isi Kategori lagi karena tadi kena migrate:fresh
        $this->call(KategoriSeeder::class);

        // Buat Akun Admin
        \App\Models\User::create([
            'name'     => 'Admin Sewa Kendaraan',
            'email'    => 'admin@test.com',
            'password' => bcrypt('password123'),
            'role'     => 'admin',
        ]);
    }   // ← ini yang kurang
}       // ← ini yang kurang

