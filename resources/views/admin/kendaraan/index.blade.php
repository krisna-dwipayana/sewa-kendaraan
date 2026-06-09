@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Kelola Armada</h2>
        <a href="{{ route('admin.kendaraan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium shadow-md transition">
            + Tambah Kendaraan
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full min-w-max table-auto text-left">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kendaraan</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plat Nomor</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kapasitas</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga/Hari</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($kendaraans as $k)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($k->gambar)
                        <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->nama_kendaraan }}" class="w-20 h-16 object-cover rounded-lg shadow-sm border border-gray-100">
                    @else
                        <div class="w-20 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs border border-gray-200">
                            No Image
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $k->nama_kendaraan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                    {{ $k->plat_nomor }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $k->kapasitas }} Orang
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Rp {{ number_format($k->harga_sewa, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $k->status == 'Tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $k->status }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-2">
                    <a href="{{ route('admin.kendaraan.edit', $k->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.kendaraan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus armada ini cuy?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-400">
                    Belum ada data armada nih cuy. Klik tombol tambah di atas!
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
    </div>
@endsection