@extends('layouts.app')

@section('title', 'Fakultas & Program Studi - Universitas Elang Kuasa')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge rounded-pill px-3 py-2 mb-3" style="background-color: rgba(13,110,253,0.1); color: var(--primary-blue);">
            5 Fakultas &bull; 22 Program Studi
        </span>
        <h2 class="fw-bold" style="color: var(--primary-blue);">Fakultas & Program Studi</h2>
        <p class="text-muted mx-auto" style="max-width: 560px;">
            Jelajahi berbagai pilihan program studi unggulan dari 5 fakultas kami dan temukan passion-mu.
        </p>
    </div>

    <div class="row g-4">

        {{-- Fakultas Teknik --}}
        <div class="col-md-6 col-lg-4">
            <div class="card faculty-card border-0 shadow-sm rounded-4 h-100" style="--accent: #2563eb;">
                <div class="faculty-card-top"></div>
                <div class="p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="faculty-icon"><i class="fas fa-gears"></i></div>
                        <span class="badge rounded-pill faculty-count">5 Prodi</span>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--primary-blue);">Fakultas Teknik</h4>
                    <div class="faculty-highlight mb-3">
                        <i class="fas fa-industry me-2"></i>Lab fabrikasi &amp; studio struktur bersama praktisi industri
                    </div>
                    <h6 class="fw-bold text-uppercase small text-muted mb-2" style="letter-spacing:.04em;">Program Studi</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('jurusan.show', 'teknik-informatika') }}" class="faculty-link">S1 Teknik Informatika <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'teknik-sipil') }}" class="faculty-link">S1 Teknik Sipil <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'teknik-elektro') }}" class="faculty-link">S1 Teknik Elektro <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'teknik-industri') }}" class="faculty-link">S1 Teknik Industri <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'arsitektur') }}" class="faculty-link">S1 Arsitektur <i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Fakultas Ekonomi & Bisnis --}}
        <div class="col-md-6 col-lg-4">
            <div class="card faculty-card border-0 shadow-sm rounded-4 h-100" style="--accent: #16a34a;">
                <div class="faculty-card-top"></div>
                <div class="p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="faculty-icon"><i class="fas fa-chart-line"></i></div>
                        <span class="badge rounded-pill faculty-count">4 Prodi</span>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--primary-blue);">Ekonomi & Bisnis</h4>
                    <div class="faculty-highlight mb-3">
                        <i class="fas fa-rocket me-2"></i>Inkubator bisnis mendanai 30 usaha mahasiswa tiap tahun
                    </div>
                    <h6 class="fw-bold text-uppercase small text-muted mb-2" style="letter-spacing:.04em;">Program Studi</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('jurusan.show', 'manajemen-bisnis') }}" class="faculty-link">S1 Manajemen Bisnis <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'akuntansi') }}" class="faculty-link">S1 Akuntansi <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'bisnis-digital') }}" class="faculty-link">S1 Bisnis Digital <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'ekonomi-pembangunan') }}" class="faculty-link">S1 Ekonomi Pembangunan <i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Fakultas Kedokteran --}}
        <div class="col-md-6 col-lg-4">
            <div class="card faculty-card border-0 shadow-sm rounded-4 h-100" style="--accent: #dc2626;">
                <div class="faculty-card-top"></div>
                <div class="p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="faculty-icon"><i class="fas fa-stethoscope"></i></div>
                        <span class="badge rounded-pill faculty-count">4 Prodi</span>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--primary-blue);">Fakultas Kedokteran</h4>
                    <div class="faculty-highlight mb-3">
                        <i class="fas fa-hospital me-2"></i>Rumah sakit pendidikan sendiri, 420 tempat tidur di kampus
                    </div>
                    <h6 class="fw-bold text-uppercase small text-muted mb-2" style="letter-spacing:.04em;">Program Studi</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('jurusan.show', 'kedokteran') }}" class="faculty-link">S1 Kedokteran <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'farmasi') }}" class="faculty-link">S1 Farmasi <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'keperawatan') }}" class="faculty-link">S1 Ilmu Keperawatan <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'gizi') }}" class="faculty-link">S1 Gizi <i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Fakultas Hukum & Sosial --}}
        <div class="col-md-6 col-lg-4">
            <div class="card faculty-card border-0 shadow-sm rounded-4 h-100" style="--accent: #7c3aed;">
                <div class="faculty-card-top"></div>
                <div class="p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="faculty-icon"><i class="fas fa-scale-balanced"></i></div>
                        <span class="badge rounded-pill faculty-count">4 Prodi</span>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--primary-blue);">Hukum & Sosial</h4>
                    <div class="faculty-highlight mb-3">
                        <i class="fas fa-people-group me-2"></i>Klinik bantuan hukum gratis, dikelola mahasiswa tingkat akhir
                    </div>
                    <h6 class="fw-bold text-uppercase small text-muted mb-2" style="letter-spacing:.04em;">Program Studi</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('jurusan.show', 'ilmu-hukum') }}" class="faculty-link">S1 Ilmu Hukum <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'ilmu-komunikasi') }}" class="faculty-link">S1 Ilmu Komunikasi <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'hubungan-internasional') }}" class="faculty-link">S1 Hubungan Internasional <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'psikologi') }}" class="faculty-link">S1 Psikologi <i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Fakultas Ilmu Pendidikan --}}
        <div class="col-md-6 col-lg-4">
            <div class="card faculty-card border-0 shadow-sm rounded-4 h-100" style="--accent: #ea580c;">
                <div class="faculty-card-top"></div>
                <div class="p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="faculty-icon"><i class="fas fa-chalkboard-user"></i></div>
                        <span class="badge rounded-pill faculty-count">4 Prodi</span>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--primary-blue);">Ilmu Pendidikan</h4>
                    <div class="faculty-highlight mb-3">
                        <i class="fas fa-school me-2"></i>Praktik mengajar sejak semester 3 di 60 sekolah mitra
                    </div>
                    <h6 class="fw-bold text-uppercase small text-muted mb-2" style="letter-spacing:.04em;">Program Studi</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('jurusan.show', 'pgsd') }}" class="faculty-link">S1 PGSD <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'pendidikan-bahasa-inggris') }}" class="faculty-link">S1 Pendidikan Bahasa Inggris <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'pendidikan-matematika') }}" class="faculty-link">S1 Pendidikan Matematika <i class="fas fa-arrow-right"></i></a></li>
                        <li><a href="{{ route('jurusan.show', 'paud') }}" class="faculty-link">S1 PAUD <i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Kartu ajakan: hubungi admisi jika masih ragu --}}
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 rounded-4 h-100 d-flex align-items-center justify-content-center text-center p-4" style="background: linear-gradient(135deg, var(--primary-blue), #1e3a8a); color:#fff; min-height: 260px;">
                <i class="fas fa-comments fs-1 mb-3 text-warning"></i>
                <h5 class="fw-bold mb-2">Masih bingung pilih jurusan?</h5>
                <p class="small mb-4" style="opacity:.85;">Konsultasi gratis dengan tim admisi kami untuk menemukan program studi yang paling cocok.</p>
                <a href="{{ route('pendaftaran') }}" class="btn btn-warning fw-bold rounded-pill px-4">
                    Konsultasi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .faculty-card {
        overflow: hidden;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .faculty-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.12) !important;
    }
    .faculty-card-top {
        height: 6px;
        background: var(--accent);
    }
    .faculty-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: var(--accent);
        background: color-mix(in srgb, var(--accent) 12%, white);
    }
    .faculty-count {
        background: color-mix(in srgb, var(--accent) 12%, white);
        color: var(--accent);
        font-weight: 600;
        font-size: .75rem;
        padding: .4rem .7rem;
    }
    .faculty-highlight {
        background: #f8f9fa;
        border-left: 3px solid var(--accent);
        border-radius: .5rem;
        padding: .6rem .8rem;
        font-size: .82rem;
        color: #495057;
    }
    .faculty-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        font-weight: 600;
        font-size: .92rem;
        color: #343a40;
        padding: .5rem .6rem;
        border-radius: .6rem;
        margin-bottom: .2rem;
        transition: background .15s ease, color .15s ease, padding-left .15s ease;
    }
    .faculty-link i {
        font-size: .75rem;
        opacity: 0;
        transition: opacity .15s ease;
    }
    .faculty-link:hover {
        background: color-mix(in srgb, var(--accent) 10%, white);
        color: var(--accent);
        padding-left: .9rem;
    }
    .faculty-link:hover i {
        opacity: 1;
    }
    @media (max-width: 576px) {
        .faculty-icon { width: 48px; height: 48px; font-size: 1.2rem; }
    }
</style>
@endsection