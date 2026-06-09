@extends('layouts.user')

@section('content')
    <section class="bg-[#007bff] text-white py-20 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">{{ $title }}</h1>
            <p class="text-lg text-blue-100">Pilihan armada terbaik dengan harga transparan. Perjalanan aman, nyaman, dan terpercaya.</p>
        </div>
    </section>

    <section class="bg-gray-50 py-16 px-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
                <h3 class="text-xl font-bold text-gray-800">Menampilkan Katalog : {{ $title }}</h3>
                <a href="{{ route('home') }}" class="text-sm font-bold text-gray-500 hover:text-[#007bff]">&larr; Kembali ke Home</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-stretch">
                @forelse($kendaraans as $k)
                    <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 flex flex-col justify-between transition duration-300">
                        <div>
                            <div class="h-40 flex items-center justify-center mb-6">
                                @if($k->gambar)
                                    <img src="{{ asset('images/' . $k->gambar) }}" alt="{{ $k->nama_kendaraan }}" class="max-h-full object-contain hover:scale-110 transition duration-300">
                                @else
                                    <span class="text-gray-400 text-xs">No Image</span>
                                @endif
                            </div>
                            
                            <h4 class="text-gray-800 text-xl font-extrabold mb-1">{{ $k->nama_kendaraan }}</h4>
                            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full mb-3">
                                {{ $k->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                            
                            <p class="text-[#007bff] text-lg font-bold">
                                Rp {{ number_format($k->harga_sewa, 0, ',', '.') }} <span class="text-sm text-gray-400 font-normal">/hari</span>
                            </p>
                        </div>

                        <a href="#" class="mt-6 block w-full bg-gray-900 text-white py-3 rounded-lg font-bold hover:bg-[#007bff] transition shadow-md text-center">
                            Booking Sekarang
                        </a>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-20">
                        <span class="text-6xl mb-4">📭</span>
                        <h4 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Armada</h4>
                        <p class="text-gray-500">Maaf, armada untuk kategori {{ $title }} saat ini sedang kosong atau habis disewa.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection