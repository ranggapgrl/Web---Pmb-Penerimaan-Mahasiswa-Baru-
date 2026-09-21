@extends('layouts.app')

@section('title', 'Jalur Pendaftaran - Universitas Elang Kuasa')

@section('content')
@php
    /*
    |--------------------------------------------------------------------------
    | DATA HALAMAN - SEMUA ISI DI BAWAH INI ADALAH CONTOH
    |--------------------------------------------------------------------------
    | Deskripsi awal tiap jalur diambil dari halaman lama Anda. Syarat, berkas,
    | cara seleksi, FAQ, dan kontak adalah contoh. Ganti dengan aturan resmi
    | universitas sebelum dipublikasikan.
    */

    // PERLU DICEK: apakah calon mahasiswa boleh mendaftar lewat lebih dari satu jalur sekaligus?
    // Pengaturan ini mengubah jawaban pada salah satu pertanyaan di bagian FAQ.
    $bolehLebihDariSatuJalur = true;

    // Kontak panitia (CONTOH).
    $kontak = ['email' => 'pmb@example.ac.id', 'jam' => 'Senin sampai Jumat, 08.00 sampai 16.00 WIB'];

    $jalur = [
        [
            'id'        => 'prestasi',
            'nama'      => 'Jalur Prestasi',
            'singkatan' => 'PMDP',
            'arti'      => null, // Isi kepanjangan PMDP versi kampus, mis. 'Penerimaan ...'. Kosong = tidak ditampilkan.
            'ikon'      => 'fa-medal',
            'ringkas'   => 'Seleksi berdasarkan nilai rapor atau prestasi akademik dan non-akademik tanpa tes tertulis.',
            'cocok'     => 'Siswa dengan nilai rapor yang konsisten baik, atau yang punya prestasi akademik maupun non-akademik seperti lomba, olahraga, dan seni.',
            'seleksi'   => 'Penilaian nilai rapor dan bukti prestasi. Tidak ada tes tertulis.',
            'tes'       => 'Tidak',
            'syarat'    => [
                'Nilai rapor memenuhi batas minimal yang ditetapkan program studi.',
                'Melampirkan bukti prestasi bila mendaftar lewat prestasi non-akademik.',
            ],
            'berkas'    => ['Scan rapor', 'Sertifikat atau piagam prestasi (jika ada)', 'Pas foto'],
            'catatan'   => null,
        ],
        [
            'id'        => 'tes-tulis',
            'nama'      => 'Jalur Tes Tulis',
            'singkatan' => 'UTBK',
            'arti'      => 'Ujian Tulis Berbasis Komputer',
            'ikon'      => 'fa-file-alt',
            'ringkas'   => 'Seleksi reguler melalui ujian masuk berbasis komputer yang diselenggarakan secara online atau offline.',
            'cocok'     => 'Siswa yang percaya diri dengan kemampuan akademiknya dan ingin bersaing lewat ujian.',
            'seleksi'   => 'Ujian masuk berbasis komputer, diselenggarakan online atau offline sesuai jadwal.',
            'tes'       => 'Ya',
            'syarat'    => [
                'Terdaftar sebagai peserta ujian.',
                'Mengikuti ujian sesuai jadwal yang ditentukan panitia.',
            ],
            'berkas'    => ['Bukti pendaftaran ujian', 'Scan rapor', 'Pas foto'],
            'catatan'   => null,
        ],
        [
            'id'        => 'kip-k',
            'nama'      => 'Jalur Beasiswa KIP-K',
            'singkatan' => 'KIP-K',
            'arti'      => 'Kartu Indonesia Pintar Kuliah',
            'ikon'      => 'fa-handshake',
            'ringkas'   => 'Program bantuan biaya pendidikan dari pemerintah bagi calon mahasiswa berprestasi dari keluarga kurang mampu.',
            'cocok'     => 'Calon mahasiswa berprestasi dari keluarga kurang mampu yang membutuhkan bantuan biaya pendidikan.',
            'seleksi'   => 'Verifikasi data dan kondisi ekonomi keluarga, ditambah penilaian prestasi.',
            'tes'       => 'Sesuai ketentuan',
            'syarat'    => [
                'Berasal dari keluarga kurang mampu sesuai ketentuan program.',
                'Memiliki prestasi akademik yang baik.',
            ],
            'berkas'    => ['Dokumen pendukung kondisi ekonomi keluarga', 'Scan rapor', 'Pas foto'],
            'catatan'   => 'Ini program bantuan dari pemerintah, jadi ketentuannya mengikuti aturan KIP-K yang berlaku.',
        ],
    ];

    $faq = [
        [
            'tanya' => 'Boleh mendaftar lewat lebih dari satu jalur?',
            'jawab' => $bolehLebihDariSatuJalur
                ? 'Boleh. Kamu bisa mendaftar lewat lebih dari satu jalur selama masa pendaftaran masing-masing jalur masih dibuka.'
                : 'Tidak. Kamu hanya bisa memilih satu jalur pada satu waktu, jadi pilih yang paling sesuai dengan kondisimu.',
        ],
        [
            'tanya' => 'Kalau tidak lolos di satu jalur, bisa ikut jalur lain?',
            'jawab' => 'Ketentuannya mengikuti gelombang pendaftaran yang berlaku. Tanyakan ke panitia lewat kontak di bawah supaya kamu mendapat informasi yang tepat.',
        ],
        [
            'tanya' => 'Apa saja yang perlu disiapkan sebelum mendaftar?',
            'jawab' => 'Daftar berkas dan langkah-langkahnya ada di halaman cara mendaftar. Berkas utama tiap jalur juga tertulis di halaman ini.',
        ],
        [
            'tanya' => 'Berapa biaya kuliahnya?',
            'jawab' => 'Rincian biaya tiap program studi ada di halaman biaya perkuliahan, lengkap dengan kalkulator perkiraan totalnya.',
        ],
    ];

    // Sesuaikan nama route dengan milik Anda. Jika tidak ada, dipakai URL biasa.
    $linkPendaftaran = Route::has('pendaftaran') ? route('pendaftaran') : url('/pendaftaran');
    $linkBiaya       = Route::has('biaya') ? route('biaya') : url('/biaya');

    $warnaTes = fn ($t) => $t === 'Ya' ? 'bg-primary' : ($t === 'Tidak' ? 'bg-success' : 'bg-secondary');
@endphp

<style>
    .ikon-kotak {
        width: 56px; height: 56px; flex: 0 0 56px;
        display: flex; align-items: center; justify-content: center;
        border-radius: .85rem; font-size: 1.35rem;
        background-color: var(--primary-blue); color: #ffc107;
    }
    .scroll-target { scroll-margin-top: 90px; }
    .tabel-jalur thead th { background-color: var(--primary-blue); color: #fff; font-weight: 600; }
    .daftar-titik { padding-left: 1.1rem; margin-bottom: 0; }
    .daftar-titik li + li { margin-top: .4rem; }
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
            <h1 class="display-5 fw-bold mb-3">Jalur pendaftaran mahasiswa baru</h1>
            <p class="lead mb-0">
                Ada {{ count($jalur) }} jalur seleksi. Pilih yang paling sesuai dengan prestasi, kemampuan,
                dan kondisimu. Bandingkan dulu di bawah, lalu baca detail jalur yang kamu minati.
            </p>
        </div>
    </div>
</div>

<!-- Perbandingan sekilas -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Perbandingan sekilas</h2>
        <p class="text-muted mb-4">Cari jalur yang paling cocok denganmu.</p>

        <!-- Tabel untuk layar lebar -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover align-top tabel-jalur mb-0">
                <thead>
                    <tr>
                        <th>Jalur</th>
                        <th>Cocok untuk</th>
                        <th>Cara seleksi</th>
                        <th>Tes tulis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jalur as $j)
                    <tr>
                        <td class="fw-bold" style="white-space: nowrap;">
                            <a href="#{{ $j['id'] }}" class="text-decoration-none">{{ $j['nama'] }}</a>
                        </td>
                        <td>{{ $j['cocok'] }}</td>
                        <td>{{ $j['seleksi'] }}</td>
                        <td><span class="badge {{ $warnaTes($j['tes']) }}">{{ $j['tes'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Kartu untuk HP -->
        <div class="row g-3 d-md-none">
            @foreach($jalur as $j)
            <div class="col-12">
                <div class="border rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                        <a href="#{{ $j['id'] }}" class="fw-bold text-decoration-none">{{ $j['nama'] }}</a>
                        <span class="badge {{ $warnaTes($j['tes']) }}">Tes tulis: {{ $j['tes'] }}</span>
                    </div>
                    <p class="small mb-2"><span class="text-muted">Cocok untuk:</span> {{ $j['cocok'] }}</p>
                    <p class="small mb-0"><span class="text-muted">Cara seleksi:</span> {{ $j['seleksi'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Detail tiap jalur -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Detail tiap jalur</h2>
        <p class="text-muted mb-5">Syarat dan berkas yang perlu kamu siapkan untuk masing-masing jalur.</p>

        @foreach($jalur as $j)
        <div id="{{ $j['id'] }}" class="scroll-target bg-white border rounded-4 p-4 p-lg-5 {{ $loop->last ? '' : 'mb-4' }}">
            <div class="d-flex align-items-start mb-4">
                <div class="ikon-kotak me-3"><i class="fas {{ $j['ikon'] }}" aria-hidden="true"></i></div>
                <div>
                    <h3 class="h4 fw-bold mb-1">{{ $j['nama'] }} ({{ $j['singkatan'] }})</h3>
                    @if(!empty($j['arti']))
                        <div class="small text-muted mb-2">{{ $j['singkatan'] }} adalah singkatan dari {{ $j['arti'] }}.</div>
                    @endif
                    <p class="mb-0">{{ $j['ringkas'] }}</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Cocok untuk siapa</h4>
                    <p class="text-muted mb-4">{{ $j['cocok'] }}</p>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Cara seleksi</h4>
                    <p class="text-muted mb-0">{{ $j['seleksi'] }}</p>
                </div>
                <div class="col-md-6">
                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Syarat</h4>
                    <ul class="daftar-titik text-muted mb-4">
                        @foreach($j['syarat'] as $baris)
                            <li>{{ $baris }}</li>
                        @endforeach
                    </ul>

                    <h4 class="h6 fw-bold" style="color: var(--primary-blue);">Berkas yang disiapkan</h4>
                    <ul class="daftar-titik text-muted mb-0">
                        @foreach($j['berkas'] as $baris)
                            <li>{{ $baris }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if(!empty($j['catatan']))
                <p class="small text-muted mt-4 mb-0">
                    <i class="fas fa-info-circle text-warning me-1" aria-hidden="true"></i>{{ $j['catatan'] }}
                </p>
            @endif

            <a href="{{ $linkPendaftaran }}" class="btn btn-outline-primary rounded-pill px-4 mt-4">Lihat cara mendaftar</a>
        </div>
        @endforeach
    </div>
</section>

<!-- Pertanyaan yang sering diajukan -->
<section class="py-5">
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
                <h2 class="fw-bold mb-2">Sudah tahu jalur yang cocok?</h2>
                <p class="mb-0 text-white-50">Masih ragu? Tanyakan ke panitia. Layanan: {{ $kontak['jam'] }}.</p>
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