@extends('layouts.header')
@section('title', 'Detail Data')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="detail-container">
            
            <div class="card" id="card1">
                <span class="title">Detail Donatur</span>
                
                <div class="profile-section">
                    <div class="info-group">
                        <span class="info-label">Nama Donatur</span>
                        <div class="info-value">
                            {{ $donatur->nama }}
                            @if($donatur->nama == 'Anonim' || $donatur->anonim == 1) 
                                <span class="badge-theme">Anonim</span>
                            @endif
                        </div>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Pesan Donasi</span>
                        <div class="message-box">
                            "{{ $donatur->pesan }}"
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="card2">
                <div class="text-center mb-3" style="margin-top: 0; font-weight:bold;">Rincian Dana</div>

                <div class="invoice-row">
                    <span class="invoice-label">Waktu Transaksi</span>
                    <span class="invoice-value">
                        {{ \Carbon\Carbon::parse($donatur->created_at)->format('d M Y, H:i') }}
                    </span>
                </div>

                <hr class="dashed-divider">

                <div class="amount-display">
                    <span class="currency">Rp</span>
                    {{ number_format($donatur->total_donasi, 0, ',', '.') }}
                </div>

                <p class="text-center mt-4 mb-2" style="font-size: 14px; color: #636666;">Metode Pembayaran</p>
                
                <div class="d-flex justify-content-center">
                    <div class="selected-payment">
                        <div class="radio-tile static-selected">
                            <span class="radio-icon">
                                @if($donatur->tipe_bayar == 'Gopay')
                                    <img src="/images/pembayaran/opsi1-gopay.png" alt="Gopay" />
                                @elseif($donatur->tipe_bayar == 'Dana')
                                    <img src="/images/pembayaran/opsi2-dana.png" alt="Dana" />
                                @elseif($donatur->tipe_bayar == 'BCA Virtual Account')
                                    <img src="/images/pembayaran/opsi3-bca.png" alt="BCA" />
                                @else
                                    <span>{{ $donatur->tipe_bayar }}</span>
                                @endif
                            </span>
                        </div>
                        <div class="payment-label">{{ $donatur->tipe_bayar }}</div>
                    </div>
                </div>

                <a href="{{ url()->previous() }}" style="text-decoration: none;">
                    <button type="button" style="width: 100%;"><span>Kembali</span></button>
                </a>
            </div>

        </div>
    </div>

    <style>
        .card {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            width: 400px;
            display: flex;
            flex-direction: column;
        }
        #card1 { margin-bottom: 7px; }
        .title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }
        button {
            display: inline-block;
            border-radius: 8px;
            background-color: #2260ff;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 16px;
            transition: all 0.5s;
            cursor: pointer;
            margin-top: 25px;
        }
        button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        button span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -15px;
            transition: 0.5s;
        }
        button:hover span { padding-right: 15px; }
        button:hover span:after { opacity: 1; right: 0; }

        .radio-tile {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 98px;
            min-height: 80px;
            border-radius: 0.8rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            padding: 7px;
            position: relative; /* Added for context */
        }
        .radio-icon img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 0.85rem;
        }
        
        .detail-container {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
        }

        .info-group {
            margin-bottom: 20px;
            position: relative;
        }

        .info-label {
            font-size: 12px;
            color: #2260ff; 
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 18px;
            color: #333;
            font-weight: 500;
            border-bottom: 1px solid #eee; /* Garis tipis minimalis */
            padding-bottom: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .badge-theme {
            background-color: #b5c9fc; /* Warna biru muda dari efek focus radio */
            color: #2260ff;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .message-box {
            background-color: #f8f9fa;
            border: 1px solid #b5bfd9; /* Warna border sama dengan tile */
            border-radius: 5px;
            padding: 15px;
            font-style: italic;
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .amount-display {
            text-align: center;
            background-color: #f0f4ff; /* Biru sangat muda */
            padding: 20px 0;
            border-radius: 8px;
            color: #2260ff;
            font-weight: bold;
            font-size: 32px;
            border: 1px dashed #b5c9fc;
            margin-bottom: 10px;
        }
        
        .amount-display .currency {
            font-size: 16px;
            vertical-align: top;
            opacity: 0.7;
        }

        .divider {
            border: 0;
            border-top: 1px solid #eee;
            margin: 20px 0;
        }

        .static-selected {
            border-color: #2260ff; /* Langsung biru seolah-olah checked */
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transform: scale(1.05); /* Sedikit lebih besar untuk emphasis */
        }
        
        .static-selected:before {
            content: "✓";
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 1.2rem;
            height: 1.2rem;
            background-color: #2260ff;
            color: white;
            border-radius: 50%;
            top: -8px;
            right: -8px;
            font-size: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .payment-label {
            text-align: center;
            margin-top: 8px;
            font-weight: 600;
            color: #2260ff;
        }

        /* Row Kiri-Kanan untuk Tanggal */
        .invoice-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 0 5px;
        }

        .invoice-label {
            font-size: 13px;
            color: #8898aa;
        }

        .invoice-value {
            font-size: 13px;
            font-weight: 600;
            color: #333;
        }

        /* Garis Putus-putus ala Struk */
        .dashed-divider {
            border: 0;
            border-top: 2px dashed #dbe2f0; /* Garis putus-putus warna soft */
            margin: 5px 0 20px 0;
        }

        /* Update sedikit pada Amount agar lebih pas dengan garis */
        .amount-display {
            text-align: center;
            background-color: #f4f7ff; /* Biru sedikit lebih pekat biar kontras */
            padding: 25px 0;
            border-radius: 12px;
            color: #2260ff;
            font-weight: 800;
            font-size: 32px;
            border: none; /* Hilangkan border garis, ganti background block */
        }

    </style>
@endsection