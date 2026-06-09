<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-800">User Terdaftar</h3>
                    <p class="text-gray-500 text-sm">Berikut adalah daftar pelanggan yang memiliki akun di sistem rental.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700">No</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700">Nama Lengkap</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700">Alamat Email</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700 text-center">Tanggal Join</th>
                                <th class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 px-4 py-3 text-center text-sm text-gray-600">{{ $loop->iteration }}</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-800">{{ $user->name }}</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-center text-gray-600">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>
                                <td class="border border-gray-200 px-4 py-3 text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        Aktif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>