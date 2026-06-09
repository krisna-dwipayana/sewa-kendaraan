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
    Schema::create('kendaraans', function (Blueprint $table) {
        $table->id();
        // Ini menghubungkan kendaraan ke kategorinya
        $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->onDelete('cascade');
        
        $table->string('nama_kendaraan'); // Contoh: Honda Beat, Avanza, ATV
        $table->string('plat_nomor')->nullable(); 
        $table->integer('kapasitas'); // Jumlah orang
        $table->integer('harga_sewa'); 
        $table->string('gambar')->nullable();
        $table->enum('status', ['Tersedia', 'Disewa'])->default('Tersedia');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
