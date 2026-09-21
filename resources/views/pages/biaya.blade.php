@extends('layouts.app')

@section('title', 'Biaya Perkuliahan - Universitas Elang Kuasa')

@section('content')
@php
    /*
    |--------------------------------------------------------------------------
    | PENGATURAN HALAMAN
    |--------------------------------------------------------------------------
    | Angka biaya di bawah adalah angka dari halaman lama Anda (tidak diubah).
    | Bagian bertanda CONTOH harus diganti dengan aturan resmi universitas.
    */

    // Tahun ajaran yang berlaku, mis. '2026/2027'. Kosongkan (null) kalau tidak ingin ditampilkan.
    $tahunAjaran = null;

    // PERLU DICEK: apakah "Praktikum / Lainnya" dibayar tiap semester (true) atau sekali saja di awal (false)?
    // Pengaturan ini mengubah keterangan di halaman dan cara menghitung perkiraan total.
    $praktikumPerSemester = true;

    // Jumlah semester yang dipakai untuk perkiraan total (S1 = 8 semester).
    $jumlahSemester = 8;

    // CONTOH: cara pembayaran dan cicilan. Ganti dengan aturan resmi.
    $caraBayar = [
        ['ikon' => 'fa-hand-holding-dollar', 'judul' => 'Uang gedung bisa diangsur', 'deskripsi' => 'Uang gedung dapat dibagi menjadi beberapa kali pembayaran sesuai kesepakatan dengan bagian keuangan.'],
        ['ikon' => 'fa-calendar-check',      'judul' => 'SPP dibayar tiap semester', 'deskripsi' => 'Lunasi SPP sebelum masa registrasi semester berjalan dimulai.'],
        ['ikon' => 'fa-building-columns',    'judul' => 'Cara membayar',             'deskripsi' => 'Transfer ke rekening resmi universitas atau bayar langsung di loket bagian keuangan.'],
    ];

    // CONTOH: kontak bagian keuangan. Ganti dengan kontak resmi.
    $kontak = ['email' => 'keuangan@example.ac.id', 'jam' => 'Senin sampai Jumat, 08.00 sampai 16.00 WIB'];

    // Data biaya per fakultas (dalam rupiah).
    $fakultas = [
        ['id' => 'teknik', 'nama' => 'Fakultas Teknik', 'ikon' => 'fa-gears', 'prodi' => [
            ['slug' => 'teknik-informatika', 'nama' => 'S1 Teknik Informatika', 'gedung' => 5500000, 'spp' => 4200000, 'lain' => 750000],
            ['slug' => 'teknik-sipil',       'nama' => 'S1 Teknik Sipil',       'gedung' => 5000000, 'spp' => 4000000, 'lain' => 700000],
            ['slug' => 'teknik-elektro',     'nama' => 'S1 Teknik Elektro',     'gedung' => 5200000, 'spp' => 4100000, 'lain' => 750000],
            ['slug' => 'teknik-industri',    'nama' => 'S1 Teknik Industri',    'gedung' => 5000000, 'spp' => 3900000, 'lain' => 650000],
            ['slug' => 'arsitektur',         'nama' => 'S1 Arsitektur',         'gedung' => 5500000, 'spp' => 4300000, 'lain' => 800000],
        ]],
        ['id' => 'ekonomi', 'nama' => 'Fakultas Ekonomi & Bisnis', 'ikon' => 'fa-chart-line', 'prodi' => [
            ['slug' => 'manajemen-bisnis',     'nama' => 'S1 Manajemen Bisnis',     'gedung' => 4500000, 'spp' => 3500000, 'lain' => 500000],
            ['slug' => 'akuntansi',            'nama' => 'S1 Akuntansi',            'gedung' => 4500000, 'spp' => 3500000, 'lain' => 500000],
            ['slug' => 'bisnis-digital',       'nama' => 'S1 Bisnis Digital',       'gedung' => 4800000, 'spp' => 3800000, 'lain' => 600000],
            ['slug' => 'ekonomi-pembangunan',  'nama' => 'S1 Ekonomi Pembangunan',  'gedung' => 4200000, 'spp' => 3300000, 'lain' => 450000],
        ]],
        ['id' => 'kedokteran', 'nama' => 'Fakultas Kedokteran', 'ikon' => 'fa-stethoscope', 'prodi' => [
            ['slug' => 'kedokteran', 'nama' => 'S1 Kedokteran',       'gedung' => 15000000, 'spp' => 9500000, 'lain' => 2500000],
            ['slug' => 'farmasi',    'nama' => 'S1 Farmasi',          'gedung' => 6500000,  'spp' => 5000000, 'lain' => 1200000],
            ['slug' => 'keperawatan','nama' => 'S1 Ilmu Keperawatan', 'gedung' => 6000000,  'spp' => 4800000, 'lain' => 1000000],
            ['slug' => 'gizi',       'nama' => 'S1 Gizi',             'gedung' => 5000000,  'spp' => 3900000, 'lain' => 800000],
        ]],
        ['id' => 'hukum-sosial', 'nama' => 'Fakultas Hukum & Sosial', 'ikon' => 'fa-scale-balanced', 'prodi' => [
            ['slug' => 'ilmu-hukum',             'nama' => 'S1 Ilmu Hukum',             'gedung' => 4500000, 'spp' => 3600000, 'lain' => 500000],
            ['slug' => 'ilmu-komunikasi',        'nama' => 'S1 Ilmu Komunikasi',        'gedung' => 4800000, 'spp' => 3800000, 'lain' => 600000],
            ['slug' => 'hubungan-internasional', 'nama' => 'S1 Hubungan Internasional', 'gedung' => 5000000, 'spp' => 4000000, 'lain' => 600000],
            ['slug' => 'psikologi',              'nama' => 'S1 Psikologi',              'gedung' => 5000000, 'spp' => 4000000, 'lain' => 700000],
        ]],
        ['id' => 'pendidikan', 'nama' => 'Fakultas Ilmu Pendidikan', 'ikon' => 'fa-chalkboard-user', 'prodi' => [
            ['slug' => 'pgsd',                      'nama' => 'S1 PGSD',                      'gedung' => 4000000, 'spp' => 3200000, 'lain' => 450000],
            ['slug' => 'pendidikan-bahasa-inggris', 'nama' => 'S1 Pendidikan Bahasa Inggris', 'gedung' => 4200000, 'spp' => 3400000, 'lain' => 500000],
            ['slug' => 'pendidikan-matematika',     'nama' => 'S1 Pendidikan Matematika',     'gedung' => 4000000, 'spp' => 3200000, 'lain' => 450000],
            ['slug' => 'paud',                      'nama' => 'S1 PAUD',                      'gedung' => 3800000, 'spp' => 3000000, 'lain' => 400000],
        ]],
    ];

    // ---- Turunan dari data di atas (tidak perlu diubah) ----
    $rp = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $biayaAwal = fn ($p) => $p['gedung'] + $p['spp'] + $p['lain'];

    // Sesuaikan nama route dengan milik Anda. Jika tidak ada, dipakai URL biasa.
    $linkDetail = fn ($s) => Route::has('jurusan.show') ? route('jurusan.show', $s) : url('/jurusan/' . $s);

    $labelLain   = $praktikumPerSemester ? 'per semester' : 'dibayar sekali';
    $keteranganLain = $praktikumPerSemester
        ? 'Dibayar setiap semester untuk kebutuhan praktikum dan biaya penunjang lainnya.'
        : 'Dibayar sekali di awal untuk kebutuhan praktikum dan biaya penunjang lainnya.';

    $dataKalkulator = [];
    foreach ($fakultas as $f) {
        foreach ($f['prodi'] as $p) {
            $dataKalkulator[$p['slug']] = ['nama' => $p['nama'], 'gedung' => $p['gedung'], 'spp' => $p['spp'], 'lain' => $p['lain']];
        }
    }
@endphp

<style>
    .ikon-kotak {
        width: 48px; height: 48px; flex: 0 0 48px;
        display: flex; align-items: center; justify-content: center;
        border-radius: .75rem; font-size: 1.15rem;
        background-color: var(--primary-blue); color: #ffc107;
    }
    .scroll-target { scroll-margin-top: 90px; }
    .tabel-biaya thead th { background-color: var(--primary-blue); color: #fff; font-weight: 600; vertical-align: bottom; }
    .tabel-biaya thead th small { display: block; font-weight: 400; opacity: .8; }
    .tabel-biaya td.biaya-awal, .angka-utama { font-weight: 700; color: var(--primary-blue); }
    .baris-biaya { display: flex; justify-content: space-between; gap: 1rem; padding: .35rem 0; }
    .baris-biaya + .baris-biaya { border-top: 1px solid #eef0f2; }
</style>

<!-- Pembuka -->
<div class="text-white py-5" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="col-lg-8 px-0">
            <h1 class="display-5 fw-bold mb-3">Rincian biaya perkuliahan</h1>
            <p class="lead mb-0">
                Lihat berapa yang perlu disiapkan saat pertama masuk dan perkiraan biaya sampai lulus.
                @if($tahunAjaran) Angka berlaku untuk tahun ajaran {{ $tahunAjaran }}. @endif
            </p>
        </div>
    </div>
</div>

<!-- Tiga komponen biaya -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Biaya kuliah terdiri dari tiga bagian</h2>
        <p class="text-muted mb-4">Supaya tidak bingung membaca tabel, ini arti masing-masing.</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <div class="ikon-kotak me-3"><i class="fas fa-building" aria-hidden="true"></i></div>
                    <div>
                        <h3 class="h6 fw-bold mb-1">Uang gedung</h3>
                        <p class="text-muted small mb-0">Dibayar sekali saja saat pertama masuk.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <div class="ikon-kotak me-3"><i class="fas fa-calendar-alt" aria-hidden="true"></i></div>
                    <div>
                        <h3 class="h6 fw-bold mb-1">SPP</h3>
                        <p class="text-muted small mb-0">Biaya kuliah yang dibayar setiap semester.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <div class="ikon-kotak me-3"><i class="fas fa-flask" aria-hidden="true"></i></div>
                    <div>
                        <h3 class="h6 fw-bold mb-1">Praktikum dan lainnya</h3>
                        <p class="text-muted small mb-0">{{ $keteranganLain }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kalkulator -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Hitung biaya program studimu</h2>
        <p class="text-muted mb-4">Pilih program studi untuk melihat rincian dan perkiraan totalnya.</p>

        <div class="row g-4">
            <div class="col-lg-5">
                <label for="pilih-prodi" class="form-label fw-bold">Program studi</label>
                <select id="pilih-prodi" class="form-select form-select-lg">
                    <option value="">Pilih program studi</option>
                    @foreach($fakultas as $f)
                        <optgroup label="{{ $f['nama'] }}">
                            @foreach($f['prodi'] as $p)
                                <option value="{{ $p['slug'] }}">{{ $p['nama'] }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-7" aria-live="polite">
                <div id="hasil-kosong" class="border rounded-3 bg-white p-4 text-muted">
                    Rincian biaya akan tampil di sini setelah kamu memilih program studi.
                </div>

                <div id="hasil-biaya" class="border rounded-3 bg-white p-4 d-none">
                    <h3 class="h5 fw-bold mb-3" id="out-nama"></h3>

                    <div class="baris-biaya"><span>Uang gedung (sekali)</span><strong id="out-gedung"></strong></div>
                    <div class="baris-biaya"><span>SPP (per semester)</span><strong id="out-spp"></strong></div>
                    <div class="baris-biaya"><span>Praktikum dan lainnya ({{ $labelLain }})</span><strong id="out-lain"></strong></div>

                    <div class="row g-3 mt-2">
                        <div class="col-sm-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <div class="small text-muted">Biaya awal masuk</div>
                                <div class="fs-4 angka-utama" id="out-awal"></div>
                                <div class="small text-muted mt-1">Uang gedung + SPP semester pertama + praktikum dan lainnya.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <div class="small text-muted">Perkiraan total {{ $jumlahSemester }} semester</div>
                                <div class="fs-4 angka-utama" id="out-total"></div>
                                <div class="small text-muted mt-1">Dengan asumsi biaya tidak berubah. Belum termasuk pendidikan profesi.</div>
                            </div>
                        </div>
                    </div>

                    <a id="out-link" href="#" class="btn btn-outline-primary rounded-pill mt-3">Lihat detail jurusan</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Daftar biaya per fakultas -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Daftar biaya semua program studi</h2>
        <p class="text-muted mb-3">Pilih fakultas untuk langsung menuju tabelnya.</p>

        <div class="d-flex flex-wrap gap-2 mb-5">
            @foreach($fakultas as $f)
                <a href="#{{ $f['id'] }}" class="btn btn-outline-primary rounded-pill btn-sm px-3">{{ $f['nama'] }}</a>
            @endforeach
        </div>

        @foreach($fakultas as $f)
        <div id="{{ $f['id'] }}" class="scroll-target mb-5">
            <h3 class="h4 fw-bold mb-3" style="color: var(--primary-blue);">
                <i class="fas {{ $f['ikon'] }} me-2 text-warning" aria-hidden="true"></i>{{ $f['nama'] }}
            </h3>

            <!-- Tabel untuk layar lebar -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-hover align-middle tabel-biaya mb-0">
                    <thead>
                        <tr>
                            <th>Program studi</th>
                            <th class="text-end">Uang gedung<small>sekali di awal</small></th>
                            <th class="text-end">SPP<small>per semester</small></th>
                            <th class="text-end">Praktikum dan lainnya<small>{{ $labelLain }}</small></th>
                            <th class="text-end">Biaya awal masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($f['prodi'] as $p)
                        <tr>
                            <td><a href="{{ $linkDetail($p['slug']) }}" class="text-decoration-none fw-semibold">{{ $p['nama'] }}</a></td>
                            <td class="text-end">{{ $rp($p['gedung']) }}</td>
                            <td class="text-end">{{ $rp($p['spp']) }}</td>
                            <td class="text-end">{{ $rp($p['lain']) }}</td>
                            <td class="text-end biaya-awal">{{ $rp($biayaAwal($p)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Kartu untuk HP -->
            <div class="row g-3 d-md-none">
                @foreach($f['prodi'] as $p)
                <div class="col-12">
                    <div class="border rounded-3 p-3">
                        <a href="{{ $linkDetail($p['slug']) }}" class="d-block fw-bold text-decoration-none mb-2">{{ $p['nama'] }}</a>
                        <div class="baris-biaya"><span class="text-muted">Uang gedung (sekali)</span><span>{{ $rp($p['gedung']) }}</span></div>
                        <div class="baris-biaya"><span class="text-muted">SPP (per semester)</span><span>{{ $rp($p['spp']) }}</span></div>
                        <div class="baris-biaya"><span class="text-muted">Praktikum, lainnya ({{ $labelLain }})</span><span>{{ $rp($p['lain']) }}</span></div>
                        <div class="baris-biaya"><strong>Biaya awal masuk</strong><span class="angka-utama">{{ $rp($biayaAwal($p)) }}</span></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Cara pembayaran -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Cara pembayaran dan cicilan</h2>
        <p class="text-muted mb-4">Biaya dapat diangsur sesuai kemampuan. Ini gambaran alurnya.</p>

        <div class="row g-4">
            @foreach($caraBayar as $item)
            <div class="col-md-4">
                <div class="d-flex align-items-start">
                    <div class="ikon-kotak me-3"><i class="fas {{ $item['ikon'] }}" aria-hidden="true"></i></div>
                    <div>
                        <h3 class="h6 fw-bold mb-1">{{ $item['judul'] }}</h3>
                        <p class="text-muted small mb-0">{{ $item['deskripsi'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bantuan -->
<section class="py-5 text-white" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-2">Sudah menemukan program studimu?</h2>
                <p class="mb-0 text-white-50">Pertanyaan soal biaya bisa ditanyakan ke bagian keuangan. Layanan: {{ $kontak['jam'] }}.</p>
            </div>
            <div class="col-lg-6 d-flex flex-wrap gap-2 justify-content-lg-end">
                <a href="{{ route('pendaftaran') }}" class="btn btn-warning fw-bold rounded-pill px-4">Lihat cara mendaftar</a>
                <a href="mailto:{{ $kontak['email'] }}" class="btn btn-outline-light rounded-pill px-4">
                    <i class="fas fa-envelope me-1" aria-hidden="true"></i> {{ $kontak['email'] }}
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    (function () {
        var data = @json($dataKalkulator);
        var linkDetail = @json(collect($dataKalkulator)->map(fn ($d, $slug) => $linkDetail($slug)));
        var praktikumPerSemester = @json($praktikumPerSemester);
        var semester = @json($jumlahSemester);

        var pilih = document.getElementById('pilih-prodi');
        var kosong = document.getElementById('hasil-kosong');
        var hasil = document.getElementById('hasil-biaya');

        function rp(n) { return 'Rp ' + new Intl.NumberFormat('id-ID').format(n); }
        function isi(id, teks) { document.getElementById(id).textContent = teks; }

        function tampilkan() {
            var d = data[pilih.value];
            if (!d) {
                hasil.classList.add('d-none');
                kosong.classList.remove('d-none');
                return;
            }
            var awal = d.gedung + d.spp + d.lain;
            var total = d.gedung + (d.spp * semester) + (praktikumPerSemester ? d.lain * semester : d.lain);

            isi('out-nama', d.nama);
            isi('out-gedung', rp(d.gedung));
            isi('out-spp', rp(d.spp));
            isi('out-lain', rp(d.lain));
            isi('out-awal', rp(awal));
            isi('out-total', rp(total));
            document.getElementById('out-link').setAttribute('href', linkDetail[pilih.value]);

            kosong.classList.add('d-none');
            hasil.classList.remove('d-none');
        }

        pilih.addEventListener('change', tampilkan);
        tampilkan();
    })();
</script>
@endsection