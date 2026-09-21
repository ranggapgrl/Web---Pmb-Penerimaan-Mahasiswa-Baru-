@extends('layouts.app')

@section('title', 'Karir - Universitas Elang Kuasa')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: var(--primary-blue);">Pusat Karir & Bursa Kerja</h2>
        <p class="text-muted">Temukan peluang kerja, magang, dan pengembangan karir profesional bersama mitra industri kami.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-primary-blue mb-3"><i class="fas fa-briefcase text-warning me-2"></i> Lowongan Kerja Full-Time</h5>
                <p class="text-muted small">Informasi lowongan pekerjaan terbaru dari 340+ perusahaan mitra nasional dan multinasional khusus untuk alumni.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-primary-blue mb-3"><i class="fas fa-user-graduate text-warning me-2"></i> Program Magang Berbayar</h5>
                <p class="text-muted small">Kesempatan magang selama 1 semester penuh di perusahaan top dengan kompensasi dan bimbingan langsung.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-primary-blue mb-3"><i class="fas fa-chalkboard-teacher text-warning me-2"></i> Pelatihan & Sertifikasi</h5>
                <p class="text-muted small">Workshop rutin persiapan kerja, tes psikotes simulasi, dan sertifikasi keahlian berstandar industri.</p>
            </div>
        </div>
    </div>
</div>
@endsection