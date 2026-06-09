@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Tambah Kendaraan</h2>
    <a href="{{ route('admin.kendaraan') }}" class="text-gray-500 hover:text-gray-700 underline">Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
    <form action="{{ route('admin.kendaraan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf 
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Kendaraan</label>
            <select name="kategori_id" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition bg-white">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kendaraan (Merk & Tipe)</label>
            <input type="text" name="nama_kendaraan" placeholder="Contoh: Honda Beat Pop" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Plat Nomor</label>
            <input type="text" name="plat_nomor" placeholder="Contoh: B 1234 XYZ" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition uppercase">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas (Orang)</label>
            <input type="number" name="kapasitas" placeholder="Contoh: 2" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Sewa / Hari (Rp)</label>
            <input type="number" name="harga_sewa" placeholder="Contoh: 75000" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Foto Kendaraan</label>
            <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 outline-none transition bg-gray-50">
            <span class="text-xs text-gray-500 mt-1">*Format: JPG, JPEG, PNG.</span>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg shadow-md transition">
            Simpan Kendaraan
        </button>
    </form>
</div>
@endsection