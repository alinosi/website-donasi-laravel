<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Ghazian')</title>
    <link rel="icon" href="/images/layout/icon-light.svg">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="/images/layout/logo_test.svg"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/donasi">Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/donatur">List Donatur</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> {{ ucwords(Auth::user()->username) }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if (Auth::user()->jenisAkun === 'admin')
                                <a class="dropdown-item" href="/admin/dashboard">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="/session/logout">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/session"><i class="fa-solid fa-right-to-bracket"></i>Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    @if (session('error'))
        <div class="modal fade" id="errorModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="errorModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalCenterTitle"> {{ session('errorHeader') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer">
                        @if (Auth::check() && Auth::user()->jenisAkun === 'guest')
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        @else
                            <a href="/session" class="btn btn-primary">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    <br><br>
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <a href="/" class="footer-logo">
                        <img src="/images/layout/logo_test.svg" alt="Sambung Asa Logo" class="mb-3">
                    </a>
                    <p class="text-white-50">
                        Platform gotong royong untuk membantu sesama. Salurkan kebaikan Anda melalui donasi yang transparan dan tepat sasaran.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 ml-auto">
                    <h5 class="text-white mb-3">Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/donasi">Mulai Donasi</a></li>
                        <li><a href="/donatur">Daftar Donatur</a></li>
                        <li><a href="/session">Masuk / Daftar</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">Hubungi Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fa-solid fa-location-dot mr-2"></i> Jl. Kebaikan No. 123, Jakarta, Indonesia</li>
                        <li class="mb-2"><i class="fa-solid fa-phone mr-2"></i> +62 812 3456 7890</li>
                        <li class="mb-2"><i class="fa-solid fa-envelope mr-2"></i> info@sambungasa.com</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white-50">
                        <p class="mb-0">&copy; {{ date('Y') }} Sambung Asa. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                $('#errorModalCenter').modal('show');
            @endif
        });
    </script>
</body>

</html>

<style>
    .navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    body {
        padding-top: 65px;
        font-family: "Poppins", sans-serif;
        color: #343434;
        background-color: #f2f2f2;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .navbar-brand img {
        width: 250px;
        margin-left: 20px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    .navbar-nav .nav-link {
        margin-right: 30px;
    }

    .fa-right-to-bracket {
        font-size: 0.9em;
        margin-right: 0.5rem;
    }

    .fa-user {
        font-size: 0.8em;
        margin-right: 0.4rem;
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.096), 0 6px 20px rgba(0, 0, 0, 0.096);
    }

    .footer-section {
        background-color: #1a2e44;
        padding-top: 60px;
        color: #ffffff;
        margin-top: auto;
    }

    .footer-logo img {
        width: 200px;
        filter: brightness(0) invert(1); 
    }

    .footer-section ul li {
        margin-bottom: 10px;
    }

    .footer-section ul li a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-section ul li a:hover {
        color: #ffffff;
        padding-left: 5px;
    }

    .social-icons a {
        display: inline-block;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border-radius: 50%;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        background: #007bff;
        color: #ffffff;
        transform: translateY(-3px);
    }

    .copyright-area {
        background-color: #122131;
        padding: 20px 0;
        margin-top: 40px;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .footer-section {
            text-align: left;
        }
        
        .footer-logo img {
            width: 180px;
        }
    }
</style>

