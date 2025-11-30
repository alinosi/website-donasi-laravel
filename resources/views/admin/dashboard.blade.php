@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header_title', 'Dashboard Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase">Total Users</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                    <i data-feather="users"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase">Active Programs</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalPrograms ?? 0 }}</p>
                </div>
                <div class="p-3 bg-green-100 text-green-600 rounded-full">
                    <i data-feather="layers"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase">Dana Terkumpul (Bulan Ini)</p>
                    <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($monthlyIncome ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                    <i data-feather="dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-gray-700">Transaksi Terakhir</h3>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-500 hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Program</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestTransactions as $trx)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium">{{ $trx->user->username }}</td>
                        <td class="px-6 py-3">{{ $trx->program->program_name }}</td>
                        <td class="px-6 py-3">Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $trx->status == 'success' ? 'bg-green-100 text-green-700' : 
                                  ($trx->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-400">Belum ada transaksi data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection