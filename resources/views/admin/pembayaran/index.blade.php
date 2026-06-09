<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Validasi Bukti Transfer</h3>
                    <p class="text-gray-500 text-sm">Periksa foto bukti pembayaran dari pelanggan sebelum mengaktifkan status sewa.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-700 text-left">Penyewa</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-700 text-left">Armada</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-700 text-center">Bukti Transfer</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($pembayarans as $p)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-800">{{ $p->user->name }}</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $p->kendaraan->nama_kendaraan }}</td>
                                <td class="border border-gray-200 px-4 py-3 text-center">
                                    <a href="{{ asset('storage/'.$p->bukti_transfer) }}" target="_blank" title="Klik untuk memperbesar">
                                        <img src="{{ asset('storage/'.$p->bukti_transfer) }}" style="height: 50px; width: 80px; object-fit: cover; margin: auto; border-radius: 4px; border: 1px solid #e5e7eb; cursor: zoom-in;">
                                    </a>
                                </td>
                                <td class="border border-gray-200 px-4 py-3 text-center">
                                    <form action="{{ route('pembayaran.konfirmasi', $p->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" style="background-color: #2563eb; color: white; padding: 6px 16px; border-radius: 6px; font-weight: bold; font-size: 12px; border: none; cursor: pointer; transition: 0.2s;">
                                            Konfirmasi Lunas
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="border border-gray-200 px-4 py-12 text-center text-gray-400 italic">
                                    <div class="flex flex-col items-center">
                                        <span class="text-3xl mb-2">📩</span>
                                        <p>Belum ada unggahan bukti transfer baru dari pelanggan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>