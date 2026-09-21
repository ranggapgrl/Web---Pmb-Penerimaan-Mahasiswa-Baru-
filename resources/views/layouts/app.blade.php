<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Universitas Elang Kuasa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root { --primary-blue: #003366; --accent-gold: #ffc107; --light-bg: #f4f7f9; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: var(--light-bg); overflow-x: hidden; }

        /* --- Top Bar Atas --- */
        .top-bar { background-color: var(--primary-blue); color: white; font-size: 0.85rem; padding: 8px 0; }
        .top-bar a { color: white; text-decoration: none; margin-left: 15px; transition: color 0.3s; }
        .top-bar a:hover { color: var(--accent-gold); }
        
        /* --- Navbar --- */
        .navbar { background-color: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 15px 0; z-index: 1000; }
        .navbar-nav .nav-link { color: #333; font-weight: 600; margin: 0 10px; position: relative; transition: color 0.3s; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: var(--primary-blue); }
        .dropdown-menu { border-radius: 15px; border-top: 4px solid var(--accent-gold); }
        .dropdown-item:hover { background-color: rgba(0, 51, 102, 0.05); color: var(--primary-blue); transform: translateX(5px); transition: all 0.3s ease; }

        .btn-gold { background-color: var(--accent-gold); color: #000; font-weight: bold; border-radius: 30px; padding: 10px 25px; transition: all 0.3s ease; text-decoration: none;}
        .btn-gold:hover { background-color: transparent; color: var(--accent-gold); border: 2px solid var(--accent-gold); transform: translateY(-3px); }

        /* --- Footer Komplit & Media Sosial --- */
        .footer { background-color: #001a33; color: #adb5bd; padding: 70px 0 20px; margin-top: 80px; }
        .footer h5 { color: white; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 10px; }
        .footer h5::after { content: ''; position: absolute; left: 0; bottom: 0; width: 40px; height: 2px; background-color: var(--accent-gold); }
        .footer a { color: #adb5bd; text-decoration: none; transition: all 0.3s ease; display: inline-block; }
        .footer a:hover { color: var(--accent-gold); transform: translateX(5px); }
        
        .footer-social-links a { 
            display: inline-flex; width: 38px; height: 38px; background: rgba(255,255,255,0.08); 
            color: white; align-items: center; justify-content: center; border-radius: 50%; 
            margin-right: 8px; font-size: 0.9rem; transition: all 0.3s ease; text-decoration: none;
        }
        .footer-social-links a:hover { background: var(--accent-gold); color: #000; transform: translateY(-3px); }
    </style>

    {{-- Tempat CSS tambahan dari halaman anak, misalnya home.blade.php --}}
    @stack('styles')
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-phone-alt me-2 text-warning"></i> 08154317957 
                <span class="mx-2">|</span> 
                <i class="fas fa-envelope me-2 text-warning"></i> info@elangkuasa.ac.id
            </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('karir') }}">Karir</a>
            <a href="{{ route('alumni') }}">Alumni</a>
            <a href="{{ route('berita') }}">Berita & Event</a>
            <a href="{{ route('login') }}"><i class="fas fa-lock me-1"></i> Login Mahasiswa</a>
        </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <i class="fas fa-graduation-cap fa-2x me-2" style="color: var(--primary-blue);"></i>
                <h4 class="mb-0 fw-bold" style="color: var(--primary-blue);">ELANG <span style="color: var(--accent-gold);">KUASA</span></h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('akademik') ? 'active' : '' }}" href="{{ route('akademik') }}">Akademik</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('jalur') ? 'active' : '' }}" href="{{ route('jalur') }}">Jalur Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('beasiswa') ? 'active' : '' }}" href="{{ route('beasiswa') }}">Beasiswa</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('pendaftaran*') || request()->is('petunjuk*') || request()->is('biaya*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pendaftaran</a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item py-2" href="{{ route('petunjuk') }}"><i class="fas fa-info-circle text-warning me-2"></i> Petunjuk Pendaftaran</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('biaya') }}"><i class="fas fa-file-invoice-dollar text-warning me-2"></i> Biaya Perkuliahan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 fw-bold text-primary-blue" href="{{ route('pendaftaran') }}"><i class="fas fa-edit text-warning me-2"></i> Form Pendaftaran</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('pendaftaran') }}" class="btn btn-gold">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 mb-3">
                    <h5 class="d-flex align-items-center"><i class="fas fa-graduation-cap me-2 text-warning"></i> ELANG KUASA</h5>
                    <p class="small mt-3" style="line-height: 1.7;">Mendidik pemikir kritis, inovatif, dan pemimpin masa depan dengan kurikulum berbasis industri serta nilai moral yang kuat di kancah global.</p>
                    
                    <!-- Ikom Media Sosial Dipindah ke Sini -->
                    <div class="footer-social-links mt-4">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-3">
                    <h5>Akademik</h5>
                    <ul class="list-unstyled small mt-3">
                        <li class="mb-2"><a href="{{ route('akademik') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Fakultas Teknik</a></li>
                        <li class="mb-2"><a href="{{ route('akademik') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Fakultas Ekonomi</a></li>
                        <li class="mb-2"><a href="{{ route('akademik') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Fakultas Kesehatan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-3">
                    <h5>Pendaftaran PMB</h5>
                    <ul class="list-unstyled small mt-3">
                        <li class="mb-2"><a href="{{ route('petunjuk') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Petunjuk Pendaftaran</a></li>
                        <li class="mb-2"><a href="{{ route('jalur') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Jalur Masuk</a></li>
                        <li class="mb-2"><a href="{{ route('biaya') }}"><i class="fas fa-chevron-right me-2 text-warning"></i> Biaya Perkuliahan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-3">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled small mt-3">
                        <li class="mb-3 d-flex"><i class="fas fa-map-marker-alt me-3 text-warning mt-1"></i> Jl. Raya Kampus Elang Kuasa No. 1</li>
                        <li class="mb-3 d-flex"><i class="fas fa-phone-alt me-3 text-warning mt-1"></i> 08154317957</li>
                        <li class="mb-3 d-flex"><i class="fas fa-envelope me-3 text-warning mt-1"></i> info@elangkuasa.ac.id</li>
                    </ul>
                </div>
            </div>
            <div class="text-center small mt-5 border-top border-secondary pt-4">
                <p class="mb-0">© 2026 Universitas Elang Kuasa. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Tempat JS tambahan dari halaman anak, misalnya home.blade.php --}}
    @stack('scripts')
</body>
</html>