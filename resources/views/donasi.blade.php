@extends('layouts.header')
@section('title', 'mulai donasi') {{-- Judul Tab Browser Dinamis --}}

@section('content')
<br>
<br>
@php
    $index = 0;
@endphp
        @foreach ( $donationsdata as $donationdata )
        <div class="container">
            <div class="card mb-3 mt-4" id="animated-card">
                {{-- GAMBAR DINAMIS --}}
                {{-- Pastikan path gambar sesuai dengan penyimpanan kamu (misal: di folder public atau storage) --}}
                <img class="card-img-top" 
                    src="{{ asset('storage/program_images/' . $donationdata->image) }}" 
                    alt="{{ $donationdata->program_name }}"
                    style="height: 200px; object-fit: cover;" />
                <div class="card-body">
                    {{-- JUDUL DINAMIS --}}
                    <h5 class="card-title">{{ $donationdata->program_name }}</h5>

                    {{-- TOTAL DONATUR (Sudah Dinamis dari kode lama Anda) --}}
                    <p class="card-text" id="total-donatur">
                        <i class="fa-regular fa-circle-check"></i> 
                        {{ isset($donationsRecapt[$index]) ? $donationsRecapt[$index]->total_user : 0 }} Orang Telah Berdonasi
                    </p>

                    <div class="row">
                        {{-- SECTION KIRI --}}
                        <div class="col-sm">
                            {{-- TOTAL TERKUMPUL (Sudah Dinamis dari kode lama Anda) --}}
                            <p class="card-text" id="total-kumpul">
                                Rp {{ number_format($donationdata->funds_collected, 0, ',', '.') }}
                            </p>

                            {{-- TARGET DONASI DINAMIS --}}
                            <p class="card-text" id="total-jumlah">
                                Terkumpul dari 
                                <strong>Rp {{ number_format($donationdata->target_funds, 0, ',', '.') }}</strong>
                            </p>
                        </div>

                        {{-- SECTION KANAN --}}
                        <div class="col-sm text-right">
                            {{-- LINK DINAMIS --}}
                            {{-- Mengirim ID donasi agar halaman pembayaran tahu donasi mana yang dibayar --}}
                            <a href="{{ route('pembayaran', $donationdata->id) }}">
                                <button class="pushable">
                                    <span class="shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front">Mulai Donasi</span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="progress">
                        {{-- LOGIKA PERSENTASE DINAMIS --}}
                        @php
                            // Mencegah error division by zero jika target 0
                            $target = $donationdata->target_funds > 0 ? $donationdata->target_funds : 1;
                            $persentase = ($donationdata->funds_collected / $target) * 100;

                            // Membatasi agar bar tidak lebih dari 100% secara visual
                            $width = $persentase > 100 ? 100 : $persentase;
                        @endphp

                        <div class="progress-bar" role="progressbar" style="width: {{ $width }}%;"
                            aria-valuenow="{{ $persentase }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $index++;
        @endphp    
    @endforeach
    

    <style>
        /* CSS TETAP SAMA SEPERTI SEBELUMNYA */
        #animated-card {
            animation: scrollUp 1s ease-in-out forwards;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.096), 0 6px 30px rgba(0, 0, 0, 0.096);
        }

        @keyframes scrollUp {
            0% { transform: translateY(10px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .fa-circle-check { font-size: 0.9em; margin-right: 0.4em; }
        
        .card-title {
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 0%;
        }

        #total-donatur { margin-bottom: 30px; }

        #total-kumpul {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: -0.3%;
        }

        #total-jumlah { font-size: 15px; }
        #total-jumlah strong { font-weight: 600; }

        .progress {
            margin-top: 1rem;
            margin-bottom: 0.2rem;
            border-radius: 20px;
            height: 5px;
        }

        .progress-bar {
            border-radius: 20px;
            animation: animateProgressBar 2s ease-out;
            background: -webkit-linear-gradient(left, #4df3ff 0%, #007bff 100%);
        }

        @keyframes animateProgressBar {
            from { width: 0%; }
            to { width: {{ $width }}%; } /* Gunakan variabel width yang sudah dibatasi */
        }

        .pushable {
            margin-top: 0.2rem;
            position: relative;
            background: transparent;
            padding: 0px;
            border: none;
            cursor: pointer;
            outline-offset: 4px;
            outline-color: deeppink;
            transition: filter 250ms;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .edge {
            position: absolute;
            top: 0; left: 0; height: 100%; width: 100%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 12px 32px;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .pushable:hover { filter: brightness(110%); }
        .pushable:hover .front {
            transform: translateY(-6px);
            transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }
        .pushable:active .front {
            transform: translateY(-2px);
            transition: transform 34ms;
        }
        .pushable:hover .shadow {
            transform: translateY(4px);
            transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }
        .pushable:active .shadow {
            transform: translateY(1px);
            transition: transform 34ms;
        }
        .pushable:focus:not(:focus-visible) { outline: none; }
    </style>
@endsection