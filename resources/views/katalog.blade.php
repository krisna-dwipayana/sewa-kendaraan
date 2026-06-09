@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="mb-10 text-center md:text-left">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">Pilihan Armada Terbaik Buat Kamu</h2>
        
        <div class="flex flex-col md:flex-row gap-4 mt-6 items-center">
            <form action="{{ route('user.katalog') }}" method="GET" class="relative flex items-center w-full max-w-md">
                @if(request('kategori')) <input type="hidden" name="kategori" value="{{ request('kategori') }}"> @endif
                
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kendaraan..." 
                    class="w-full pl-6 pr-14 py-3.5 border border-gray-200 rounded-full shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition bg-white">
                <button type="submit" class="absolute right-2 top-1.5 bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-full transition cursor-pointer border-none shadow-sm">
                    🔍
                </button>
            </form>

            <form action="{{ route('user.katalog') }}" method="GET" class="flex gap-2 w-full md:w-auto">
                @if(request('kategori')) <input type="hidden" name="kategori" value="{{ request('kategori') }}"> @endif
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min Harga" class="border p-3 rounded-full text-sm w-32 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Harga" class="border p-3 rounded-full text-sm w-32 focus:ring-2 focus:ring-blue-500 outline-none">
                <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded-full text-sm font-bold hover:bg-black transition">Filter</button>
            </form>
        </div>

        @if(request('search') && $kendaraans->isEmpty())
            <p class="text-red-500 text-sm mt-4">Armada "<b>{{ request('search') }}</b>" nggak ketemu sayang. Coba kata kunci lain!</p>
        @endif

        <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mt-4">
            @if(request('kategori'))
                <span class="bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold flex items-center shadow-sm">
                    Kategori: {{ request('kategori') }} 
                    <a href="{{ route('user.katalog') }}" class="ml-2 bg-blue-200 hover:bg-red-500 hover:text-white text-blue-700 rounded-full w-5 h-5 flex items-center justify-center transition-colors">✕</a>
                </span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($kendaraans as $k)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group">
                <div class="h-56 w-full bg-gray-100 relative overflow-hidden">
                    @if($k->gambar)
                        <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->nama_kendaraan }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1 rounded-full text-xs font-bold text-green-600 shadow-sm">
                        {{ $k->status }}
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $k->nama_kendaraan }}</h3>
                    <div class="flex flex-wrap items-center gap-2 mb-4 text-xs text-gray-600 font-semibold uppercase">
                        <span class="bg-gray-100 border border-gray-200 px-2 py-1 rounded">👥 {{ $k->kapasitas }} Orang</span>
                        <span class="bg-gray-100 border border-gray-200 px-2 py-1 rounded">💳 {{ $k->plat_nomor }}</span>
                    </div>
                    
                    <div class="mt-auto pt-5 border-t border-gray-100 flex flex-col space-y-4">
                        <div>
                            <span class="text-xs text-gray-400 block uppercase font-semibold mb-1">Harga Sewa</span>
                            <span class="text-2xl font-extrabold text-blue-600">Rp {{ number_format($k->harga_sewa, 0, ',', '.') }}</span>
                        </div>
                        
                        <a href="{{ route('user.detail', $k->id) }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 rounded-xl transition shadow-md">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-gray-200 border-dashed">
                <p class="text-gray-500 font-medium text-lg">Yah sayang, armadanya belum ada yang tersedia nih.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection