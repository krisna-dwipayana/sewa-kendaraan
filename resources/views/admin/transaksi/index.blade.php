@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Sewa (Transaksi)</h2>
        <p class="text-gray-500 text-sm">Pantau semua pesanan rental masuk di sini.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-max table-auto text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Nama Pelanggan</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Armada</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Durasi Sewa</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Total Bayar</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Berkas</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($transaksis as $t)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $t->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $t->kendaraan->nama_kendaraan }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($t->tanggal_mulai)->format('d M Y') }} s/d 
                                {{ \Carbon\Carbon::parse($t->tanggal_selesai)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                            </td>
                            
                            <td class="px-6 py-4 text-sm">
                                @if($t->foto_identitas)
                                    <a href="{{ asset($t->foto_identitas) }}" target="_blank" class="inline-flex items-center justify-center w-full mb-1 text-xs font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition">
                                        📄 KTP/SIM
                                    </a>
                                @endif
                                
                                @if($t->bukti_pembayaran)
                                    <a href="{{ asset($t->bukti_pembayaran) }}" target="_blank" class="inline-flex items-center justify-center w-full text-xs font-semibold text-green-700 bg-green-50 hover:bg-green-100 px-3 py-1.5 rounded-lg transition">
                                        💳 Struk
                                    </a>
                                @endif
                                
                                @if(!$t->foto_identitas && !$t->bukti_pembayaran)
                                    <span class="text-xs text-gray-400 italic">Tidak ada berkas</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $t->status_transaksi == 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $t->status_transaksi == 'Berjalan' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $t->status_transaksi == 'Selesai' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $t->status_transaksi == 'Batal' ? 'bg-red-100 text-red-800' : '' }}
                                ">
                                    {{ $t->status_transaksi }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium flex space-x-2">
                                @if($t->status_transaksi == 'Menunggu')
                                    <form action="{{ route('admin.transaksi.status', $t->id) }}" method="POST">
                                        @csrf 
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Berjalan">
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs transition shadow-sm">
                                            Setujui (Jalan)
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.transaksi.status', $t->id) }}" method="POST" onsubmit="return confirm('Yakin mau membatalkan sewa ini cuy?')">
                                        @csrf 
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Batal">
                                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded-lg text-xs transition">
                                            Batalkan
                                        </button>
                                    </form>
                                @elseif($t->status_transaksi == 'Berjalan')
                                    <form action="{{ route('admin.transaksi.status', $t->id) }}" method="POST">
                                        @csrf 
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Selesai">
                                        <button type="submit" style="background-color: #16a34a;" class="hover:bg-green-700 text-white px-3 py-1.5 rounded-lg text-xs transition shadow-sm font-medium">
                                            Selesai Sewa
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs italic font-normal">Selesai diproses</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-400">
                                Belum ada riwayat transaksi sewa nih cuy.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection