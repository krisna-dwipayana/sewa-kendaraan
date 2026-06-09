@extends('layouts.admin')

@section('content')
<div class="p-8 w-full">
    <div class="bg-white rounded-xl shadow-sm p-4 mb-8 border border-gray-100 flex items-center gap-3">
        <span class="text-xl">👋</span>
        <span class="text-gray-700 font-medium">Selamat Datang di Panel Admin Sewa Kendaraan!</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-blue-500">
            <div class="text-xs font-bold text-gray-400 uppercase mb-2">Total Armada</div>
            <div class="text-3xl font-extrabold text-gray-900">{{ $total_armada }} <span class="text-lg font-medium text-gray-500">Unit</span></div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-orange-500">
            <div class="text-xs font-bold text-gray-400 uppercase mb-2">Total Transaksi</div>
            <div class="text-3xl font-extrabold text-gray-900">{{ $transaksi_aktif }} <span class="text-lg font-medium text-gray-500">Pesanan</span></div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-green-500">
            <div class="text-xs font-bold text-gray-400 uppercase mb-2">Total Pendapatan</div>
            <div class="text-3xl font-extrabold text-green-600">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</div>
        </div>
    </div>

    </div>
@endsection