@extends('layouts.admin')

@section('title', 'Manajemen Users')
@section('header_title', 'Manajemen Users')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <form action="" method="GET" class="relative w-full md:w-64">
                <i data-feather="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" name="search" placeholder="Cari user..." class="w-full pl-10 pr-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </form>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition flex items-center">
                <i data-feather="plus" class="w-4 h-4 mr-2"></i> Tambah User
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        {{-- <th class="px-6 py-3">Email</th> --}}
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Bergabung</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 font-medium text-gray-800">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3 font-bold text-xs">
                                    {{ substr($user->username, 0, 1) }}
                                </div>
                                {{ $user->username }}
                            </div>
                        </td>
                        {{-- <td class="px-6 py-3">{{ $user->email }}</td> --}}
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $user->jenisAkun == 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($user->jenisAkun ?? 'user') }}
                            </span>
                        </td>
                        <td class="px-6 py-3">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i data-feather="edit" class="w-4 h-4 inline"></i></a>
                            <button class="text-red-500 hover:text-red-700"><i data-feather="trash-2" class="w-4 h-4 inline"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada data user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $users->links() }} 
        </div>
    </div>
@endsection