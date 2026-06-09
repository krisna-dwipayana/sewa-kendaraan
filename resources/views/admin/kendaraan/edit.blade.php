@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Kendaraan</h2>
        <a href="{{ route('admin.kendaraan') }}" class="text-gray-500 hover:text-gray-700 underline">Kembali</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.kendaraan.update', $kendaraan->id) }}" method="POST" class="space-y-6">
            @csrf 
            @method('PUT') <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kendaraan</label>
                <input type="text" name="nama_kendaraan" value="{{ $kendaraan->nama_kendaraan }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Plat Nomor</label>
                <input type="text" name="plat_nomor" value="{{ $kendaraan->plat_nomor }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition uppercase">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas (Orang)</label>
                <input type="number" name="kapasitas" value="{{ $kendaraan->kapasitas }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Rentan / Hari (Rp)</label>
                <input type="number" name="harga_sewa" value="{{ $kendaraan->harga_sewa }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status Armada</label>
                <select name="status" class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
                    <option value="Tersedia" {{ $kendaraan->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Disewa" {{ $kendaraan->status == 'Disewa' ? 'selected' : '' }}>Disewa</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg shadow-md transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection