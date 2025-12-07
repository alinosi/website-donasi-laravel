@extends('layouts.header')
@section('title', 'Sambung Asa')

@section('content')
    <div id="carouselExampleControls" class="carousel slide fade-in" data-ride="carousel">
        <div class="carousel-caption d-none d-md-block">
            <div class="header text-center">
                <h1 class="text-black">Mereka Membutuhkan Kita.</h1>
                <p class="text-black">Bersama kita bisa membuat perubahan</p>
            </div>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/images/index/header-1.png" alt="Gambar1" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-2.png" alt="Gambar2" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-3.png" alt="Gambar3" />
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="content text-center mt-5 fade-in">
        <button class="pushable" onclick="redirectDonasi()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Mulai Donasi</span>
        </button>
    </div>

    <script>
        function redirectDonasi() {
            window.location.href = "/donasi";
        }
    </script>

    <div class="container mt-5 mb-5 fade-in" style="padding-top: 50px;">
        <div class="section-title text-center mb-4">
            <h2 class="font-weight-bold" style="color: #1a2e44;">Kabar Sambung Asa</h2>
            <p class="text-muted">Update terbaru penyaluran kebaikan dari para donatur.</p>
        </div>

        <div id="newsCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                
                {{-- SLIDE 1 (Berita 1-3) --}}
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 1">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Bantuan Sembako untuk Lansia di Desa Terpencil</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 2 Hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 2">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Pembangunan Sumur Air Bersih di Nusa Tenggara</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 5 Hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 3">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Donasi Pendidikan untuk Anak Yatim Piatu</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 1 Minggu yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 (Berita 4-6) --}}
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 4">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Relawan Sambung Asa Turun ke Lokasi Banjir</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 2 Minggu yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1594708767771-a7502209ff51?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 5">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Khitanan Massal Gratis untuk 100 Anak</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 3 Minggu yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card news-card h-100">
                                <div class="news-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Berita 6">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Program Makan Gratis Jumat Berkah</h5>
                                    <p class="card-text text-muted small"><i class="fa-regular fa-clock mr-1"></i> 1 Bulan yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- TOMBOL KONTROL SLIDER --}}
            <a class="carousel-control-prev custom-control" href="#newsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-icon"><i class="fa-solid fa-chevron-left"></i></span>
            </a>
            <a class="carousel-control-next custom-control" href="#newsCarousel" role="button" data-slide="next">
                <span class="carousel-control-icon"><i class="fa-solid fa-chevron-right"></i></span>
            </a>
        </div>
    </div>
    
    <div class="container mt-5 mb-5 fade-in" style="padding-top: 50px; padding-bottom: 80px;">
        <div class="row align-items-center">
            
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div class="about-img-wrapper position-relative">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?q=80&w=800&auto=format&fit=crop" class="img-fluid rounded-lg shadow-lg main-img" alt="Tentang Sambung Asa">
                </div>
            </div>

            <div class="col-lg-6 pl-lg-5">
                <h6 class="text-primary text-uppercase font-weight-bold mb-2" style="letter-spacing: 2px;">Tentang Kami</h6>
                <h2 class="font-weight-bold mb-4" style="color: #1a2e44; line-height: 1.3;">Menghubungkan Hati, <br>Menyalurkan Harapan.</h2>
                
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Sambung Asa hadir sebagai jembatan kebaikan antara para dermawan dengan mereka yang membutuhkan. Kami berkomitmen untuk menyalurkan setiap donasi secara <strong>transparan, akuntabel, dan tepat sasaran</strong> demi kesejahteraan bersama.
                </p>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check text-success mr-2"></i>
                            <span class="font-weight-bold text-dark">Laporan Transparan</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check text-success mr-2"></i>
                            <span class="font-weight-bold text-dark">Target Terverifikasi</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check text-success mr-2"></i>
                            <span class="font-weight-bold text-dark">Respon Cepat</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check text-success mr-2"></i>
                            <span class="font-weight-bold text-dark">Akses Mudah</span>
                        </div>
                    </div>
                </div>

                <a href="https://www.instagram.com/cristiano/" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Kontak Kami</a>
            </div>

        </div>
    </div>

    <style>
        .rounded-lg {
            border-radius: 20px !important;
        }

        .about-img-wrapper {
            position: relative;
            padding: 20px;
        }

        .about-img-wrapper .main-img {
            width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
        }

        .about-img-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 200px;
            background-color: #e6f0ff; 
            border-radius: 20px;
            z-index: 0;
        }

        .about-img-wrapper::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 150px;
            height: 150px;
            background-image: radial-gradient(#007bff 2px, transparent 2px);
            background-size: 20px 20px;
            opacity: 0.3;
            z-index: 0;
        }

        .stat-badge {
            position: absolute;
            bottom: 40px;
            left: -10px;
            background: #fff;
            padding: 15px 25px;
            border-radius: 15px;
            z-index: 2;
            border-left: 5px solid #007bff;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 991px) {
            .pl-lg-5 {
                padding-left: 15px !important;
            }
            .stat-badge {
                left: 10px;
                bottom: 10px;
            }
            .about-img-wrapper::before {
                width: 100px;
                height: 100px;
            }
        }
        
        .news-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            background: white;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .news-img-wrapper {
            overflow: hidden;
            height: 200px; 
        }

        .news-card .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .card-img-top {
            transform: scale(1.1); 
        }

        .news-card .card-title {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .custom-control {
            width: 5%;
            opacity: 1;
        }

        .custom-control .carousel-control-icon {
            background-color: #007bff; 
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .custom-control:hover .carousel-control-icon {
            background-color: #0056b3;
            transform: scale(1.1);
        }
        
    
        .carousel-control-prev.custom-control {
            left: -25px;
        }
        
        .carousel-control-next.custom-control {
            right: -25px;
        }

        @media (max-width: 768px) {
            .carousel-control-prev.custom-control { left: -10px; }
            .carousel-control-next.custom-control { right: -10px; }
            .news-img-wrapper { height: 180px; }
        }

        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s ease-in forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .carousel-caption {
            top: 40%;
            font-weight: 800;
            font-style: normal;
            text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        carousel-caption h1,
        .carousel-caption p {
            font-weight: 500;
        }

        .pushable {
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

        .shadow {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: hsl(226, 25%, 69%);
            border-radius: 8px;
            filter: blur(2px);
            will-change: transform;
            transform: translateY(2px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 99%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 16px 32px;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .pushable:hover {
            filter: brightness(110%);
        }

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

        .pushable:focus:not(:focus-visible) {
            outline: none;
        }
    </style>
@endsection
