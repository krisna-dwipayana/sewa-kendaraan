<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
        $table->string('bukti_transfer'); // Akan menyimpan nama file gambar
        $table->enum('status_pembayaran', ['Pending', 'Dikonfirmasi', 'Ditolak'])->default('Pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
