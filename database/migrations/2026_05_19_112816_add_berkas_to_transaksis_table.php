<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Nambahin 2 kolom baru buat nyimpen nama file gambar
            $table->string('foto_identitas')->nullable()->after('total_harga');
            $table->string('bukti_pembayaran')->nullable()->after('foto_identitas');
        });
    }

    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['foto_identitas', 'bukti_pembayaran']);
        });
    }
};