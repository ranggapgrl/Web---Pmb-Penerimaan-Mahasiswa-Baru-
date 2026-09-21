@extends('layouts.app')

@section('title', $detail['nama'] . ' - Universitas Elang Kuasa')

@section('content')
@php
    // Sesuaikan nama route di bawah dengan route milik Anda.
    // Jika route tidak ditemukan, tautan akan memakai URL biasa.
    $linkAkademik = Route::has('akademik') ? route('akademik') : url('/akademik');
    $linkDetail   = fn ($s) => Route::has('jurusan.show') ? route('jurusan.show', $s) : url('/jurusan/' . $s);

    $warnaAkreditasi = ['A' => 'success', 'B' => 'primary', 'C' => 'secondary'][$detail['akreditasi']] ?? 'secondary';

    // Inisial avatar dosen: buang gelar depan (Prof., Dr., Ir., dr., apt., Ns., H.) dan gelar belakang
    $inisial = function ($nama) {
        $bersih = trim(explode(',', $nama)[0]);
        $bersih = preg_replace('/^(?:(?:Prof|Dr|Ir|dr|apt|Ns|H)\.\s*)+/i', '', $bersih);
        $kata   = preg_split('/\s+/', trim($bersih));
        $hasil  = mb_substr($kata[0] ?? '', 0, 1) . mb_substr($kata[1] ?? '', 0, 1);
        return mb_strtoupper($hasil ?: '?');
    };
@endphp

<style>
    .ikon-kotak {
        width: 52px; height: 52px; flex: 0 0 52px;
        display: flex; align-items: center; justify-content: center;
        border-radius: .75rem; font-size: 1.25rem;
        background-color: var(--primary-blue); color: #ffc107;
    }
    .avatar-dosen {
        width: 56px; height: 56px; flex: 0 0 56px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; font-weight: 700; font-size: 1.05rem;
        background-color: var(--primary-blue); color: #fff;
    }
    .teks-baca { max-width: 68ch; line-height: 1.8; font-size: 1.1rem; }
</style>

<!-- Header Jurusan -->
<div class="text-white py-5" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small mb-4" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.5);">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ $linkAkademik }}" class="text-white-50 text-decoration-none">Akademik</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $detail['nama'] }}</li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">{{ $detail['fakultas'] }}</span>
                <h1 class="display-5 fw-bold mb-3">{{ $detail['nama'] }}</h1>
                <p class="lead mb-0">
                    <i class="fas fa-graduation-cap me-2 text-warning" aria-hidden="true"></i>
                    Gelar lulusan <strong>{{ $detail['gelar'] }}</strong>, akreditasi <strong>{{ $detail['akreditasi'] }}</strong>
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="{{ route('pendaftaran') }}" class="btn btn-warning btn-lg fw-bold rounded-pill px-4">Daftar Jurusan Ini</a>
            </div>
        </div>
    </div>
</div>

<!-- Tentang Jurusan -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-3" style="color: var(--primary-blue);">Tentang jurusan</h2>
        <p class="text-muted teks-baca mb-4">{{ $detail['tentang'] ?? $detail['deskripsi'] }}</p>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <div class="small text-muted mb-1">Gelar lulusan</div>
                    <div class="fw-bold fs-5">{{ $detail['gelar'] }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <div class="small text-muted mb-1">Akreditasi</div>
                    <div><span class="badge bg-{{ $warnaAkreditasi }} fs-6 px-3">{{ $detail['akreditasi'] }}</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <div class="small text-muted mb-1">Lama studi</div>
                    <div class="fw-bold">{{ $detail['lama_studi'] ?? '4 tahun (8 semester)' }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kegiatan -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Ngapain aja di jurusan ini?</h2>
        <p class="text-muted mb-4">Gambaran kegiatan kuliah dan praktik yang akan kamu jalani.</p>

        <div class="row g-4">
            @foreach($detail['kegiatan'] as $kegiatan)
            <div class="col-md-6">
                <div class="d-flex h-100">
                    <div class="ikon-kotak me-3">
                        <i class="fas {{ $kegiatan['ikon'] ?? 'fa-check-circle' }}" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3 class="h5 fw-bold mb-1">{{ $kegiatan['judul'] }}</h3>
                        <p class="text-muted mb-0">{{ $kegiatan['deskripsi'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Dosen Pengajar -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Dosen pengajar</h2>
        <p class="text-muted mb-4">Kenali dosen yang akan membimbing kamu di {{ $detail['nama'] }}.</p>

        <div class="row g-4">
            @foreach($detail['dosen'] as $dosen)
            <div class="col-md-6">
                <div class="d-flex align-items-center border rounded-3 p-3 h-100">
                    <div class="avatar-dosen me-3" aria-hidden="true">{{ $inisial($dosen['nama']) }}</div>
                    <div>
                        <div class="fw-bold">{{ $dosen['nama'] }}</div>
                        @if(!empty($dosen['bidang']))
                            <div class="small text-muted mt-1">
                                <i class="fas fa-book-open text-warning me-1" aria-hidden="true"></i>{{ $dosen['bidang'] }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Prospek Karir -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Prospek karir</h2>
        <p class="text-muted mb-4">Profesi yang bisa kamu tekuni setelah lulus.</p>

        <div class="d-flex flex-wrap gap-2">
            @foreach($detail['prospek'] as $prospek)
                <span class="badge bg-white text-dark border px-3 py-2 fs-6 rounded-pill">
                    <i class="fas fa-star text-warning me-1" aria-hidden="true"></i>{{ $prospek }}
                </span>
            @endforeach
        </div>
    </div>
</section>

<!-- Ajakan Mendaftar -->
<section class="py-5 text-white" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-1">Tertarik dengan {{ $detail['nama'] }}?</h2>
                <p class="mb-0 text-white-50">Isi formulir pendaftaran dan mulai langkah pertamamu.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('pendaftaran') }}" class="btn btn-warning btn-lg fw-bold rounded-pill px-4">Daftar Jurusan Ini</a>
            </div>
        </div>
    </div>
</section>

<!-- Jurusan Lain di Fakultas yang Sama -->
@if($terkait->isNotEmpty())
<section class="py-5">
    <div class="container py-3">
        <h2 class="h4 fw-bold mb-3" style="color: var(--primary-blue);">Jurusan lain di {{ $detail['fakultas'] }}</h2>
        <div class="d-flex flex-wrap gap-2">
            @foreach($terkait as $kunci => $lain)
                <a href="{{ $linkDetail($kunci) }}" class="btn btn-outline-primary rounded-pill px-3">{{ $lain['nama'] }}</a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection