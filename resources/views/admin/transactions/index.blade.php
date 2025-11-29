@extends('layouts.admin')

@section('title', 'Riwayat Transaksi')
@section('header_title', 'Semua Transaksi')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-green-500">
            <p class="text-xs text-gray-500 font-bold uppercase">Berhasil</p>
            <p class="text-xl font-bold">{{ $countSuccess ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-yellow-500">
            <p class="text-xs text-gray-500 font-bold uppercase">Pending</p>
            <p class="text-xl font-bold">{{ $countPending ?? 0 }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">ID TRX</th>
                        <th class="px-6 py-3">Donatur</th>
                        <th class="px-6 py-3">Program</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions as $trx)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-xs font-mono text-gray-500">#{{ $trx->id }}</td>
                        <td class="px-6 py-3 font-medium">{{ $trx->user->name }}</td>
                        <td class="px-6 py-3 text-xs">{{ $trx->program->title }}</td>
                        <td class="px-6 py-3 font-bold text-gray-700">Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">{{ $trx->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                {{ $trx->status == 'success' ? 'bg-green-100 text-green-700' : 
                                  ($trx->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada riwayat transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection