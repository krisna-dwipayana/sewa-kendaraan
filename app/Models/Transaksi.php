<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = []; // Jalan ninja biar semua kolom bisa diisi

    // Relasi: Transaksi ini miliknya si User siapa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Transaksi ini menyewa Kendaraan yang mana
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}