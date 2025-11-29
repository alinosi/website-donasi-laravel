@extends('layouts.admin')

@section('title', 'Daftar Program')
@section('header_title', 'Manajemen Program')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-gray-700">Semua Program</h3>
            <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition flex items-center">
                <i data-feather="plus" class="w-4 h-4 mr-2"></i> Buat Program
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">Judul Program</th>
                        <th class="px-6 py-3">Target</th>
                        <th class="px-6 py-3">Terkumpul</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($programs as $program)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 font-medium text-gray-800 max-w-xs truncate" title="{{ $program->program_name }}">
                            {{ $program->program_name }}
                        </td>
                        <td class="px-6 py-3">Rp {{ number_format($program->target_funds, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-green-600 font-semibold">Rp {{ number_format($program->funds_collected, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $program->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $program->is_active ? 'Aktif' : 'Ditutup' }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <a href="#" class="text-gray-500 hover:text-gray-700" title="Lihat"><i data-feather="eye" class="w-4 h-4 inline"></i></a>
                            <a href="#" class="text-blue-500 hover:text-blue-700" title="Edit"><i data-feather="edit" class="w-4 h-4 inline"></i></a>
                            <button class="text-red-500 hover:text-red-700" title="Hapus"><i data-feather="trash-2" class="w-4 h-4 inline"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada program donasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
         <div class="px-6 py-4 border-t border-gray-100">
            {{ $programs->links() }}
        </div>
    </div>
@endsection