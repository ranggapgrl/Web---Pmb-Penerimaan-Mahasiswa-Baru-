@extends('layouts.app')

@section('title', 'Berita & Event - Universitas Elang Kuasa')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: var(--primary-blue);">Berita & Event Kampus</h2>
        <p class="text-muted">Ikuti perkembangan terbaru, prestasi membanggakan, dan kegiatan menarik di lingkungan kampus.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=600" class="card-img-top" alt="Berita 1" style="height: 200px; object-fit: cover;">
                <div class="card-body p-4">
                    <span class="badge bg-warning text-dark mb-2">Prestasi</span>
                    <h5 class="fw-bold mb-2">Tim Robotik Kampus Juara Dua Tingkat Asia Tenggara</h5>
                    <p class="text-muted small">Tim perwakilan mahasiswa teknik sukses membanggakan almamater di ajang kompetisi robotik internasional di Manila.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=600" class="card-img-top" alt="Berita 2" style="height: 200px; object-fit: cover;">
                <div class="card-body p-4">
                    <span class="badge bg-warning text-dark mb-2">Kerjasama</span>
                    <h5 class="fw-bold mb-2">Fakultas Teknik Buka Kelas Bersertifikat Energi Terbarukan</h5>
                    <p class="text-muted small">Kolaborasi strategis bersama perusahaan energi nasional untuk mencetak tenaga ahli masa depan yang ramah lingkungan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600" class="card-img-top" alt="Berita 3" style="height: 200px; object-fit: cover;">
                <div class="card-body p-4">
                    <span class="badge bg-warning text-dark mb-2">Kampus</span>
                    <h5 class="fw-bold mb-2">Gedung Perpustakaan Baru Dibuka 24 Jam</h5>
                    <p class="text-muted small">Fasilitas ruang belajar modern dan akses literatur digital lengkap kini siap mendukung kenyamanan akademik mahasiswa.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection