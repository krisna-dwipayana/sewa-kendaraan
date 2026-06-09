@extends('layouts.user')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-8">
        <div class="md:w-1/2">
            <img src="{{ asset('storage/' . $kendaraan->gambar) }}" class="w-full h-80 object-cover rounded-2xl">
        </div>
        <div class="md:w-1/2">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $kendaraan->nama_kendaraan }}</h1>
            <p class="text-blue-600 font-bold text-2xl mb-4">Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}/hari</p>
            <div class="space-y-3 text-gray-600 mb-6">
                <p><strong>Plat Nomor:</strong> {{ $kendaraan->plat_nomor }}</p>
                <p><strong>Kapasitas:</strong> {{ $kendaraan->kapasitas }} Orang</p>
                <p><strong>Kategori:</strong> {{ $kendaraan->kategori->nama_kategori ?? 'Umum' }}</p>
            </div>
            <a href="{{ route('user.sewa', $kendaraan->id) }}" class="block w-full text-center bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">Booking Sekarang</a>
        </div>
    </div>
</div>
@endsection