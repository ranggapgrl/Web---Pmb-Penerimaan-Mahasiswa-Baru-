@extends('layouts.app')

@section('title', 'Program Beasiswa - Universitas Elang Kuasa')

@section('content')
@php
    /*
    |--------------------------------------------------------------------------
    | DATA HALAMAN
    |--------------------------------------------------------------------------
    | Deskripsi dasar kedua beasiswa diambil dari halaman lama Anda. Syarat, berkas,
    | ketentuan, alur pengajuan, FAQ, dan kontak adalah CONTOH. Ganti dengan aturan
    | resmi universitas sebelum dipublikasikan.
    */

    // Kontak panitia (CONTOH).
    $kontak = ['email' => 'pmb@example.ac.id', 'jam' => 'Senin sampai Jumat, 08.00 sampai 16.00 WIB'];

    // Besaran potongan SPP menurut nilai rapor. Kosong = bagian ini disembunyikan.
    // Isi jika data resmi sudah ada, contoh format:
    // ['rentang' => 'Rata-rata nilai 90 ke atas', 'potongan' => 'Sekian persen'],
    $tingkatPotongan = [];

    $beasiswa = [
        [
            'id'      => 'unggulan',
            'nama'    => 'Beasiswa Unggulan 100%',
            'ikon'    => 'fa-award',
            'ringkas' => "Bebas biaya kuliah penuh selama 8 semester bagi peraih juara olimpiade tingkat nasional/internasional atau hafidz Al-Qur'an 30 juz.",
            'didapat' => 'Bebas biaya kuliah penuh selama 8 semester.',
            'untuk'   => "Peraih juara olimpiade tingkat nasional atau internasional, atau hafidz Al-Qur'an 30 juz.",
            'dasar'   => "Prestasi olimpiade atau hafalan Al-Qur'an",
            'syarat'  => [
                'Menjadi juara olimpiade tingkat nasional atau internasional, atau hafidz 30 juz.',
                'Bukti prestasi masih sah dan dapat diverifikasi.',
            ],
            'berkas'  => ['Scan rapor', "Sertifikat juara olimpiade atau bukti hafalan Al-Qur'an 30 juz", 'Pas foto'],
            'ketentuan' => ['Beasiswa berlaku selama 8 semester dan dapat dievaluasi sesuai ketentuan kampus.'],
        ],
        [
            'id'      => 'potongan-spp',
            'nama'    => 'Beasiswa Potongan SPP',
            'ikon'    => 'fa-percent',
            'ringkas' => 'Potongan biaya pengembangan dan SPP semester awal berdasarkan nilai rata-rata rapor semester 1 sampai 5.',
            'didapat' => 'Potongan biaya pengembangan dan SPP semester awal.',
            'untuk'   => 'Calon mahasiswa dengan nilai rata-rata rapor yang baik.',
            'dasar'   => 'Nilai rata-rata rapor semester 1 sampai 5',
            'syarat'  => [
                'Nilai rata-rata rapor semester 1 sampai 5 memenuhi batas minimal yang ditentukan.',
            ],
            'berkas'  => ['Scan rapor semester 1 sampai 5', 'Pas foto'],
            'ketentuan' => ['Potongan berlaku pada biaya pengembangan dan SPP semester awal.'],
        ],
    ];

    $langkah = [
        ['judul' => 'Daftar di portal PMB',        'deskripsi' => 'Buat akun, isi formulir, lalu pilih program studi yang kamu tuju.'],
        ['judul' => 'Ajukan beasiswa',             'deskripsi' => 'Pilih jenis beasiswa yang kamu incar dan unggah bukti yang diminta.'],
        ['judul' => 'Tunggu verifikasi',           'deskripsi' => 'Panitia memeriksa berkas dan bukti prestasi atau nilai rapor kamu.'],
        ['judul' => 'Lihat hasil',                 'deskripsi' => 'Hasil pengajuan beasiswa dapat dilihat di akun PMB.'],
    ];

    $faq = [
        ['tanya' => 'Kapan saya harus mengajukan beasiswa?',
         'jawab' => 'Pengajuan dilakukan saat proses pendaftaran. Pastikan semua bukti sudah diunggah sebelum masa pendaftaran ditutup.'],
        ['tanya' => 'Bisa mengambil lebih dari satu beasiswa sekaligus?',
         'jawab' => 'Ketentuannya mengikuti aturan kampus. Tanyakan ke panitia lewat kontak di bawah supaya informasinya tepat.'],
        ['tanya' => 'Apakah beasiswa bisa dicabut?',
         'jawab' => 'Beasiswa yang berlaku lebih dari satu semester bisa punya syarat yang harus dipertahankan. Ketentuan rincinya ada di bagian detail masing-masing beasiswa.'],
        ['tanya' => 'Bagaimana kalau saya belum memenuhi syarat beasiswa ini?',
         'jawab' => 'Cek Jalur KIP-K untuk bantuan biaya dari pemerintah, dan lihat halaman biaya untuk gambaran total biaya kuliah.'],
    ];

    // Sesuaikan nama route dengan milik Anda. Jika tidak ada, dipakai URL biasa.
    $linkPendaftaran = Route::has('pendaftaran') ? route('pendaftaran') : url('/pendaftaran');
    $linkBiaya       = Route::has('biaya') ? route('biaya') : url('/biaya');
    $linkJalurKipk   = (Route::has('jalur') ? route('jalur') : url('/jalur')) . '#kip-k';
@endphp

<style>
    .ikon-kotak {
        width: 52px; height: 52px; flex: 0 0 52px;
        display: flex; align-items: center; justify-content: center;
        border-radius: .85rem; font-size: 1.25rem;
        background-color: var(--primary-blue); color: #ffc107;
    }
    .scroll-target { scroll-margin-top: 90px; }
    .tabel-beasiswa thead th { background-color: var(--primary-blue); color: #fff; font-weight: 600; }
    .daftar-titik { padding-left: 1.1rem; margin-bottom: 0; }
    .daftar-titik li + li { margin-top: .4rem; }

    .alur-item { position: relative; display: flex; gap: 1.25rem; padding-bottom: 2rem; }
    .alur-item:last-child { padding-bottom: 0; }
    .alur-item:not(:last-child)::before {
        content: ""; position: absolute; left: 27px; top: 56px; bottom: 0;
        width: 2px; background-color: #dee2e6;
    }
    .alur-nomor {
        width: 56px; height: 56px; flex: 0 0 56px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; font-weight: 700; font-size: 1.25rem;
        background-color: var(--primary-blue); color: #fff;
    }

    .faq details {
        border: 1px solid #dee2e6; border-radius: .75rem;
        padding: 1rem 1.25rem; margin-bottom: .75rem; background-color: #fff;
    }
    .faq summary { cursor: pointer; font-weight: 600; }
    .faq summary:focus-visible { outline: 2px solid var(--primary-blue); outline-offset: 4px; border-radius: .25rem; }
    .faq details[open] summary { margin-bottom: .5rem; }
</style>

<!-- Pembuka -->
<div class="text-white py-5" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="col-lg-8 px-0">
            <h1 class="display-5 fw-bold mb-3">Program beasiswa kuliah</h1>
            <p class="lead mb-0">
                Ada {{ count($beasiswa) }} beasiswa dari universitas untuk membantu biaya kuliahmu.
                Bandingkan dulu, lalu baca syarat dan cara mengajukannya.
            </p>
        </div>
    </div>
</div>

<!-- Perbandingan sekilas -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Perbandingan sekilas</h2>
        <p class="text-muted mb-4">Cari beasiswa yang paling sesuai dengan kondisimu.</p>

        <!-- Tabel untuk layar lebar -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-top tabel-beasiswa mb-0">
                <thead>
                    <tr>
                        <th>Beasiswa</th>
                        <th>Yang didapat</th>
                        <th>Untuk siapa</th>
                        <th>Dasar penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beasiswa as $b)
                    <tr>
                        <td class="fw-bold" style="white-space: nowrap;"><a href="#{{ $b['id'] }}" class="text-decoration-none">{{ $b['nama'] }}</a></td>
                        <td>{{ $b['didapat'] }}</td>
                        <td>{{ $b['untuk'] }}</td>
                        <td>{{ $b['dasar'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Kartu untuk HP -->
        <div class="row g-3 d-md-none">
            @foreach($beasiswa as $b)
            <div class="col-12">
                <div class="border rounded-3 p-3">
                    <a href="#{{ $b['id'] }}" class="d-block fw-bold text-decoration-none mb-2">{{ $b['nama'] }}</a>
                    <p class="small mb-2"><span class="text-muted">Yang didapat:</span> {{ $b['didapat'] }}</p>
                    <p class="small mb-2"><span class="text-muted">Untuk siapa:</span> {{ $b['untuk'] }}</p>
                    <p class="small mb-0"><span class="text-muted">Dasar penilaian:</span> {{ $b['dasar'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Beasiswa pemerintah -->
        <div class="d-flex align-items-start border rounded-3 p-3 mt-4">
            <div class="ikon-kotak me-3"><i class="fas fa-handshake" aria-hidden="true"></i></div>
            <div>
                <h3 class="h6 fw-bold mb-1">Mencari bantuan biaya dari pemerintah?</h3>
                <p class="text-muted small mb-2">Beasiswa KIP-K tersedia lewat jalur pendaftaran tersendiri untuk calon mahasiswa berprestasi dari keluarga kurang mampu.</p>
                <a href="{{ $linkJalurKipk }}" class="small fw-bold text-decoration-none">Lihat Jalur KIP-K</a>
            </div>
        </div>
    </div>
</section>

<!-- Detail tiap beasiswa -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Detail tiap beasiswa</h2>
        <p class="text-muted mb-4">Syarat, berkas, dan ketentuan untuk masing-masing beasiswa.</p>

        <div class="row g-4">
            @foreach($beasiswa as $b)
            <div class="col-lg-6">
                <div id="{{ $b['id'] }}" class="scroll-target bg-white border rounded-4 p-4 h-100 d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ikon-kotak me-3"><i class="fas {{ $b['ikon'] }}" aria-hidden="true"></i></div>
                        <h3 class="h4 fw-bold mb-0">{{ $b['nama'] }}</h3>
                    </div>

                    <div class="bg-light rounded-3 p-3 mb-4">
                        <div class="small text-muted">Yang kamu dapat</div>
                        <div class="fw-bold" style="color: var(--primary-blue);">{{ $b['didapat'] }}</div>
                    </div>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Untuk siapa</h4>
                    <p class="text-muted mb-4">{{ $b['untuk'] }}</p>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Syarat</h4>
                    <ul class="daftar-titik text-muted mb-4">
                        @foreach($b['syarat'] as $baris)<li>{{ $baris }}</li>@endforeach
                    </ul>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Berkas yang disiapkan</h4>
                    <ul class="daftar-titik text-muted mb-4">
                        @foreach($b['berkas'] as $baris)<li>{{ $baris }}</li>@endforeach
                    </ul>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Ketentuan</h4>
                    <ul class="daftar-titik text-muted mb-4">
                        @foreach($b['ketentuan'] as $baris)<li>{{ $baris }}</li>@endforeach
                    </ul>

                    <a href="{{ $linkPendaftaran }}" class="btn btn-outline-primary rounded-pill px-4 mt-auto align-self-start">Lihat cara mendaftar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Besaran potongan SPP (tampil hanya jika datanya diisi) -->
@if(!empty($tingkatPotongan))
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Besaran potongan SPP</h2>
        <p class="text-muted mb-4">Potongan ditentukan berdasarkan nilai rata-rata rapor semester 1 sampai 5.</p>

        <div class="table-responsive" style="max-width: 640px;">
            <table class="table tabel-beasiswa align-middle mb-0">
                <thead>
                    <tr>
                        <th>Rata-rata nilai rapor</th>
                        <th class="text-end">Potongan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tingkatPotongan as $t)
                    <tr>
                        <td>{{ $t['rentang'] }}</td>
                        <td class="text-end fw-bold" style="color: var(--primary-blue);">{{ $t['potongan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

<!-- Cara mengajukan -->
<section class="py-5 {{ empty($tingkatPotongan) ? '' : 'bg-light' }}">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Cara mengajukan beasiswa</h2>
        <p class="text-muted mb-5">Ikuti langkah berikut secara berurutan.</p>

        <div style="max-width: 760px;">
            @foreach($langkah as $i => $item)
            <div class="alur-item">
                <div class="alur-nomor" aria-hidden="true">{{ $i + 1 }}</div>
                <div>
                    <h3 class="h5 fw-bold mb-1"><span class="visually-hidden">Langkah {{ $i + 1 }}: </span>{{ $item['judul'] }}</h3>
                    <p class="text-muted mb-0">{{ $item['deskripsi'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pertanyaan yang sering diajukan -->
<section class="py-5 {{ empty($tingkatPotongan) ? 'bg-light' : '' }}">
    <div class="container py-3">
        <h2 class="fw-bold mb-4" style="color: var(--primary-blue);">Pertanyaan yang sering diajukan</h2>
        <div class="faq" style="max-width: 760px;">
            @foreach($faq as $item)
            <details>
                <summary>{{ $item['tanya'] }}</summary>
                <p class="text-muted mb-0">{{ $item['jawab'] }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>

<!-- Penutup -->
<section class="py-5 text-white" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-2">Siap mengajukan beasiswa?</h2>
                <p class="mb-0 text-white-50">Ada pertanyaan? Tanyakan ke panitia. Layanan: {{ $kontak['jam'] }}.</p>
            </div>
            <div class="col-lg-6 d-flex flex-wrap gap-2 justify-content-lg-end">
                <a href="{{ $linkPendaftaran }}" class="btn btn-warning fw-bold rounded-pill px-4">Lihat cara mendaftar</a>
                <a href="{{ $linkBiaya }}" class="btn btn-outline-light rounded-pill px-4">Cek biaya kuliah</a>
            </div>
        </div>
        <p class="small text-white-50 mt-4 mb-0">
            <i class="fas fa-envelope me-1" aria-hidden="true"></i>
            <a href="mailto:{{ $kontak['email'] }}" class="text-white-50">{{ $kontak['email'] }}</a>
        </p>
    </div>
</section>
@endsection