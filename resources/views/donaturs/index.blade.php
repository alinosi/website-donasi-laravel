@extends('layouts.header')
@section('title', 'Daftar Donatur')
{{-- DASHBOARD ADMIN --}}

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Donatur</h1>
        <div class="row">
            <div class="col-12">
                @if ($donaturs->isEmpty())
                    <p class="text-center">Belum ada donatur.</p>
                @else
                    <div class="container-xxl">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Jumlah Donasi</th>
                                    <th class="text-center">Metode</th>
                                    <th class="text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaturs as $donatur)
                                    <tr>
                                        <td>{{ $donatur->created_at->format('d M Y') }}</td>
                                        <td>{{ $donatur->nama }}</td>
                                        <td>{{ $donatur->pesan }}</td>
                                        <td>Rp. {{ number_format($donatur->total_donasi, 0, ',', '.') }}</td>
                                        <td>{{ $donatur->tipe_bayar }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('donaturs.show', $donatur->id) }}"
                                                class="btn btn-sm btn-primary">Periksa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.096), 0 6px 30px rgba(0, 0, 0, 0.096);
        }
    </style>
@endsection
