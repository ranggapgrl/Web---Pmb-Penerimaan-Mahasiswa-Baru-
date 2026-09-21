@extends('layouts.app')

@section('title', 'Beranda - Universitas Elang Kuasa')

@php
    /*
    |--------------------------------------------------------------------------
    | Tautan halaman lain
    |--------------------------------------------------------------------------
    */
    $url = function ($nama, $fallback = '#') {
        return \Illuminate\Support\Facades\Route::has($nama) ? route($nama) : $fallback;
    };

    $linkDaftar   = $url('pendaftaran');
    $linkTentang  = $url('tentang');
    $linkProdi    = $url('akademik'); // Diperbaiki: mengarah ke rute 'akademik'
    $linkBiaya    = $url('biaya');
    $linkBeasiswa = $url('beasiswa');
    $linkJalur    = $url('jalur');    // Tambahan untuk rute jalur pendaftaran
    $linkBerita   = '#';              // Belum ada route berita
    $linkKontak   = '#';              // Belum ada route kontak

    $tahunAjaran = '2027/2028';
    $tutupGelombang = date('c', strtotime('+38 days 23:59:00'));

    $fakultas = [
        [
            'nama' => 'Teknik',
            'ikon' => 'fa-gears',
            'ringkas' => 'Laboratorium fabrikasi, studio struktur, dan kelas bersama praktisi industri.',
            'prodi' => ['Teknik Informatika', 'Teknik Sipil', 'Teknik Elektro', 'Teknik Industri', 'Arsitektur'],
        ],
        [
            'nama' => 'Ekonomi & Bisnis',
            'ikon' => 'fa-chart-line',
            'ringkas' => 'Inkubator bisnis kampus mendanai 30 usaha mahasiswa setiap tahun.',
            'prodi' => ['Manajemen', 'Akuntansi', 'Bisnis Digital', 'Ekonomi Pembangunan'],
        ],
        [
            'nama' => 'Kedokteran',
            'ikon' => 'fa-stethoscope',
            'ringkas' => 'Rumah sakit pendidikan sendiri dengan 420 tempat tidur di dalam kampus.',
            'prodi' => ['Kedokteran', 'Farmasi', 'Keperawatan', 'Gizi'],
        ],
        [
            'nama' => 'Hukum & Sosial',
            'ikon' => 'fa-scale-balanced',
            'ringkas' => 'Klinik bantuan hukum gratis yang dikelola mahasiswa tingkat akhir.',
            'prodi' => ['Ilmu Hukum', 'Ilmu Komunikasi', 'Hubungan Internasional', 'Psikologi'],
        ],
        [
            'nama' => 'Ilmu Pendidikan',
            'ikon' => 'fa-chalkboard-user',
            'ringkas' => 'Praktik mengajar sejak semester tiga di 60 sekolah mitra.',
            'prodi' => ['PGSD', 'Pendidikan Bahasa Inggris', 'Pendidikan Matematika', 'PAUD'],
        ],
    ];

    $alumni = [
        [
            'nama' => 'Raka Mahendra',
            'prodi' => 'Teknik Informatika 2019',
            'kerja' => 'Backend Engineer, Tokopedia',
            'kata' => 'Proyek akhir saya jadi produk yang benar-benar dipakai UMKM binaan kampus. Portofolio itu yang membuat saya lolos wawancara pertama.',
        ],
        [
            'nama' => 'Salwa Nurhaliza',
            'prodi' => 'Kedokteran 2018',
            'kerja' => 'Dokter Umum, RSUD Bandung',
            'kata' => 'Koas di rumah sakit kampus membuat jam terbang saya jauh lebih banyak sebelum lulus. Dosen pembimbingnya juga mudah ditemui.',
        ],
        [
            'nama' => 'Bagas Prakoso',
            'prodi' => 'Bisnis Digital 2020',
            'kerja' => 'Pendiri, Kopi Sekawan',
            'kata' => 'Inkubator kampus memberi modal awal dan mentor. Sekarang kami punya empat gerai dan sebelas karyawan tetap.',
        ],
        [
            'nama' => 'Intan Permata',
            'prodi' => 'Ilmu Komunikasi 2019',
            'kerja' => 'Content Lead, Kompas Group',
            'kata' => 'Studio siaran kampus dipakai bebas sampai malam. Di situ saya belajar produksi dari nol tanpa harus magang dulu.',
        ],
    ];

    $berita = [
        ['kategori' => 'Prestasi', 'tanggal' => '12 September 2026', 'judul' => 'Tim robotik kampus juara dua kontes robot tingkat Asia Tenggara di Manila'],
        ['kategori' => 'Kerja sama', 'tanggal' => '5 September 2026', 'judul' => 'Fakultas Teknik membuka kelas bersertifikat bersama perusahaan energi terbarukan'],
        ['kategori' => 'Kampus', 'tanggal' => '28 Agustus 2026', 'judul' => 'Gedung perpustakaan baru dibuka dengan ruang belajar 24 jam untuk mahasiswa'],
    ];

    $agenda = [
        ['tgl' => '03', 'bln' => 'Okt', 'judul' => 'Kampus Terbuka: keliling fasilitas bersama mahasiswa aktif', 'tempat' => 'Gedung Rektorat'],
        ['tgl' => '11', 'bln' => 'Okt', 'judul' => 'Simulasi tes masuk gratis (daring)', 'tempat' => 'Zoom'],
        ['tgl' => '25', 'bln' => 'Okt', 'judul' => 'Bincang beasiswa bersama penerima KIP-Kuliah', 'tempat' => 'Aula Elang'],
    ];
@endphp

@section('content')
<div class="ek">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@verbatim
<style>
/* ==========================================================================
   Beranda Universitas Elang Kuasa
   Semua kelas diawali .ek- agar tidak bentrok dengan Bootstrap.
   ========================================================================== */
.ek {
    --ek-navy:      #04213f;
    --ek-navy-deep: #01142a;
    --ek-navy-soft: #0b3a6b;
    --ek-gold:      #f0b429;
    --ek-gold-deep: #9a6a04;
    --ek-mist:      #eef3f8;
    --ek-line:      #d7e1ec;
    --ek-ink:       #12202f;
    --ek-muted:     #5a6b7d;

    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', sans-serif;
    color: var(--ek-ink);
    overflow-x: hidden;
}
.ek h1, .ek h2, .ek h3, .ek h4 { font-weight: 800; letter-spacing: -.02em; line-height: 1.15; }
.ek p { line-height: 1.7; }
.ek section { scroll-margin-top: 90px; }
.ek-lead { font-size: clamp(1rem, .95rem + .3vw, 1.12rem); color: var(--ek-muted); max-width: 62ch; }
.ek-meta { font-size: .85rem; color: var(--ek-muted); }
.ek-heading { font-size: clamp(1.6rem, 1.2rem + 1.7vw, 2.6rem); }
.ek-underline {
    background-image: linear-gradient(var(--ek-gold), var(--ek-gold));
    background-repeat: no-repeat; background-position: 0 88%; background-size: 0 .34em;
    transition: background-size .7s cubic-bezier(.22,1,.36,1) .2s;
}
.ek-reveal.is-in .ek-underline { background-size: 100% .34em; }

/* --- Tombol --------------------------------------------------------------- */
.ek-btn {
    display: inline-flex; align-items: center; justify-content: center; gap: .6rem;
    font-weight: 700; border-radius: 999px; padding: .85rem 1.6rem;
    border: 1px solid transparent; text-decoration: none; cursor: pointer;
    transition: transform .18s ease, box-shadow .18s ease, background-color .18s ease, color .18s ease;
}
.ek-btn-gold { background: var(--ek-gold); color: var(--ek-navy-deep); box-shadow: 0 10px 24px -10px rgba(240,180,41,.9); }
.ek-btn-gold:hover { background: #ffc73d; color: var(--ek-navy-deep); transform: translateY(-2px); }
.ek-btn-ghost { border-color: rgba(255,255,255,.45); color: #fff; }
.ek-btn-ghost:hover { background: rgba(255,255,255,.12); color: #fff; }
.ek-btn-navy { background: var(--ek-navy); color: #fff; }
.ek-btn-navy:hover { background: var(--ek-navy-soft); color: #fff; transform: translateY(-2px); }
.ek-btn-line { border-color: var(--ek-line); color: var(--ek-navy); background: #fff; }
.ek-btn-line:hover { border-color: var(--ek-navy); color: var(--ek-navy); }
.ek :is(a, button, input, [tabindex]):focus-visible { outline: 3px solid var(--ek-gold); outline-offset: 3px; border-radius: 8px; }

/* --- Hero ----------------------------------------------------------------- */
.ek-hero {
    position: relative; color: #fff; display: flex; align-items: center; min-height: 88vh;
    background:
        linear-gradient(102deg, rgba(1,20,42,.95) 0%, rgba(4,33,63,.86) 48%, rgba(4,33,63,.5) 100%),
        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920') center/cover no-repeat;
}
.ek-hero::after {
    content: ''; position: absolute; inset: 0; pointer-events: none;
    background-image: repeating-linear-gradient(115deg, rgba(240,180,41,.09) 0 1px, transparent 1px 94px);
}
.ek-hero > .container { position: relative; z-index: 2; }
.ek-hero h1 { font-size: clamp(2.1rem, 1.3rem + 3.6vw, 3.7rem); }
.ek-hero .ek-lead { color: rgba(255,255,255,.85); }

.ek-pill {
    display: inline-flex; align-items: center; gap: .55rem;
    background: rgba(240,180,41,.14); border: 1px solid rgba(240,180,41,.45);
    color: #ffd977; padding: .45rem 1rem; border-radius: 999px; font-size: .85rem; font-weight: 600;
    text-decoration: none;
}
a.ek-pill:hover { background: rgba(240,180,41,.24); color: #ffe6a3; }
.ek-dot { width: .5rem; height: .5rem; border-radius: 50%; background: #4ade80; animation: ek-ping 2s infinite; }
@keyframes ek-ping { 70%, 100% { box-shadow: 0 0 0 .6rem rgba(74,222,128,0); } 0% { box-shadow: 0 0 0 0 rgba(74,222,128,.75); } }

.ek-hero-stat { display: flex; flex-wrap: wrap; gap: 2rem; border-top: 1px solid rgba(255,255,255,.18); padding-top: 1.25rem; }
.ek-hero-stat b { display: block; font-size: 1.6rem; line-height: 1.1; font-variant-numeric: tabular-nums; }
.ek-hero-stat span { font-size: .8rem; color: rgba(255,255,255,.68); }

/* Urutan animasi saat halaman dibuka (satu momen, tidak diulang) */
.ek-enter { opacity: 0; transform: translateY(22px); animation: ek-in .8s cubic-bezier(.22,1,.36,1) forwards; }
.ek-enter-1 { animation-delay: .05s } .ek-enter-2 { animation-delay: .18s }
.ek-enter-3 { animation-delay: .31s } .ek-enter-4 { animation-delay: .44s } .ek-enter-5 { animation-delay: .57s }
@keyframes ek-in { to { opacity: 1; transform: none; } }

/* Panel hitung mundur */
.ek-panel {
    background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.16);
    border-radius: 20px; padding: 1.5rem; backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
}
.ek-count { display: grid; grid-template-columns: repeat(4, 1fr); gap: .5rem; }
.ek-count > div { background: rgba(1,20,42,.45); border-radius: 12px; padding: .7rem .25rem; text-align: center; }
.ek-count b { display: block; font-size: clamp(1.35rem, 1.1rem + .9vw, 1.8rem); color: #ffd977; font-variant-numeric: tabular-nums; }
.ek-count span { font-size: .67rem; letter-spacing: .04em; color: rgba(255,255,255,.62); }

/* --- Pintasan (kartu aksi) -------------------------------------------------- */
.ek-jump { margin-top: -3.5rem; position: relative; z-index: 3; }
.ek-jump-card {
    display: flex; align-items: center; gap: 1rem; height: 100%;
    background: #fff; border: 1px solid var(--ek-line); border-radius: 16px;
    padding: 1.15rem 1.25rem; text-decoration: none; color: var(--ek-ink);
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}
.ek-jump-card:hover { transform: translateY(-4px); border-color: #c3d3e4; box-shadow: 0 22px 40px -28px rgba(4,33,63,.6); color: var(--ek-ink); }
.ek-jump-card i.fa-arrow-right { margin-left: auto; color: var(--ek-gold-deep); transition: transform .2s ease; }
.ek-jump-card:hover i.fa-arrow-right { transform: translateX(4px); }
.ek-ico { width: 44px; height: 44px; border-radius: 13px; display: grid; place-items: center; background: var(--ek-mist); color: var(--ek-navy); flex: 0 0 auto; }
.ek-jump-card strong { display: block; font-size: .98rem; }

/* --- Angka ---------------------------------------------------------------- */
.ek-angka b { display: block; font-size: clamp(2rem, 1.5rem + 2vw, 3rem); color: var(--ek-navy); font-variant-numeric: tabular-nums; line-height: 1; }
.ek-angka span { font-size: .88rem; color: var(--ek-muted); }

/* --- Fakultas (tab interaktif) ---------------------------------------------- */
.ek-tabs { display: flex; flex-direction: column; gap: .5rem; }
.ek-tab {
    display: flex; align-items: center; gap: .9rem; width: 100%; text-align: left;
    background: #fff; border: 1px solid var(--ek-line); border-radius: 14px;
    padding: .95rem 1.1rem; font-weight: 700; color: var(--ek-muted);
    transition: all .18s ease;
}
.ek-tab:hover { border-color: var(--ek-navy); color: var(--ek-navy); }
.ek-tab.is-on { background: var(--ek-navy); border-color: var(--ek-navy); color: #fff; }
.ek-tab.is-on .ek-ico { background: rgba(255,255,255,.14); color: #ffd977; }
.ek-tab .ek-ico { width: 38px; height: 38px; border-radius: 11px; font-size: .9rem; }
.ek-panel-fak { background: #fff; border: 1px solid var(--ek-line); border-radius: 18px; padding: clamp(1.25rem, 1rem + 1.4vw, 2rem); height: 100%; }
.ek-panel-fak[hidden] { display: none; }
.ek-fade { animation: ek-fade .35s ease both; }
@keyframes ek-fade { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
.ek-prodi-tag {
    display: inline-block; background: var(--ek-mist); color: var(--ek-navy);
    border-radius: 999px; padding: .4rem .9rem; font-size: .85rem; font-weight: 600; margin: 0 .4rem .5rem 0;
}

/* --- Keunggulan ------------------------------------------------------------ */
.ek-plus { background: #fff; border: 1px solid var(--ek-line); border-radius: 18px; padding: 1.5rem; height: 100%; position: relative; overflow: hidden; }
.ek-plus::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: var(--ek-gold);
    transform: scaleY(0); transform-origin: top; transition: transform .35s cubic-bezier(.22,1,.36,1);
}
.ek-plus:hover::before { transform: scaleY(1); }

/* --- Suara alumni ---------------------------------------------------------- */
.ek-say { background: var(--ek-navy); color: #fff; border-radius: 24px; padding: clamp(1.5rem, 1rem + 2.4vw, 3rem); position: relative; overflow: hidden; }
.ek-say::before { content: ''; position: absolute; width: 460px; height: 460px; right: -150px; top: -200px; background: radial-gradient(circle, rgba(240,180,41,.26), transparent 62%); }
.ek-say > * { position: relative; }
.ek-quote { font-size: clamp(1.1rem, .95rem + .8vw, 1.6rem); font-weight: 600; line-height: 1.5; margin-bottom: 1.5rem; }
.ek-slide[hidden] { display: none; }
.ek-avatar { width: 46px; height: 46px; border-radius: 50%; background: var(--ek-gold); color: var(--ek-navy-deep); display: grid; place-items: center; font-weight: 800; }
.ek-nav-dot { width: 9px; height: 9px; border-radius: 99px; background: rgba(255,255,255,.3); border: 0; padding: 0; transition: all .25s ease; }
.ek-nav-dot.is-on { width: 26px; background: var(--ek-gold); }
.ek-arrow { width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgba(255,255,255,.3); background: transparent; color: #fff; }
.ek-arrow:hover { background: rgba(255,255,255,.14); }

/* --- Berita & agenda -------------------------------------------------------- */
.ek-news { display: block; text-decoration: none; color: inherit; border-bottom: 1px solid var(--ek-line); padding: 1.1rem 0; transition: padding-left .2s ease; }
.ek-news:hover { padding-left: .6rem; color: inherit; }
.ek-news:hover h3 { color: var(--ek-navy-soft); }
.ek-news h3 { font-size: 1.02rem; margin: .3rem 0 0; transition: color .2s ease; }
.ek-kat { font-size: .72rem; font-weight: 700; color: var(--ek-gold-deep); background: #fdf1d3; border-radius: 999px; padding: .2rem .6rem; }
.ek-agenda { display: flex; gap: 1rem; align-items: flex-start; padding: .9rem 0; border-bottom: 1px dashed var(--ek-line); }
.ek-tgl { flex: 0 0 auto; width: 52px; text-align: center; border-radius: 12px; background: var(--ek-navy); color: #fff; padding: .45rem 0; }
.ek-tgl b { display: block; font-size: 1.15rem; line-height: 1; }
.ek-tgl span { font-size: .68rem; color: rgba(255,255,255,.7); }

/* --- CTA ------------------------------------------------------------------- */
.ek-cta { background: var(--ek-navy-deep); color: #fff; border-radius: 26px; position: relative; overflow: hidden; }
.ek-cta::before { content: ''; position: absolute; width: 520px; height: 520px; right: -140px; top: -230px; background: radial-gradient(circle, rgba(240,180,41,.28), transparent 62%); }
.ek-cta > * { position: relative; }

/* --- Tombol kembali ke atas ------------------------------------------------- */
.ek-top {
    position: fixed; right: 1rem; bottom: calc(1rem + env(safe-area-inset-bottom, 0px)); z-index: 1040;
    width: 46px; height: 46px; border-radius: 50%; border: 0;
    background: var(--ek-navy); color: #fff; box-shadow: 0 10px 24px -10px rgba(0,0,0,.6);
    opacity: 0; visibility: hidden; transform: translateY(12px); transition: all .25s ease;
}
.ek-top.is-on { opacity: 1; visibility: visible; transform: none; }

/* --- Animasi masuk saat digulir --------------------------------------------- */
.ek-reveal { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s cubic-bezier(.22,1,.36,1); }
.ek-reveal.is-in { opacity: 1; transform: none; }

@media (prefers-reduced-motion: reduce) {
    .ek *, .ek *::before, .ek *::after { animation-duration: .001ms !important; transition-duration: .001ms !important; }
    .ek-reveal, .ek-enter { opacity: 1; transform: none; }
}
@media (max-width: 991.98px) {
    .ek-hero { min-height: auto; }
    .ek-jump { margin-top: 1.5rem; }
    .ek-tabs { flex-direction: row; overflow-x: auto; padding-bottom: .5rem; scrollbar-width: none; }
    .ek-tabs::-webkit-scrollbar { display: none; }
    .ek-tab { white-space: nowrap; }
}
</style>
@endverbatim

    {{-- ===================== HERO ===================== --}}
    <header class="ek-hero">
        <div class="container py-5">
            <div class="row g-5 align-items-center py-lg-4">
                <div class="col-lg-7">
                    <a href="{{ $linkDaftar }}" class="ek-pill mb-4 ek-enter ek-enter-1">
                        <span class="ek-dot"></span> Pendaftaran {{ $tahunAjaran }} sudah dibuka
                    </a>
                    <h1 class="mb-4 ek-enter ek-enter-2">Tempat belajar yang membuat kamu siap bekerja, bukan sekadar lulus.</h1>
                    <p class="ek-lead mb-4 ek-enter ek-enter-3">
                        42 program studi, rumah sakit dan inkubator bisnis di dalam kampus, serta dosen yang masih aktif di bidangnya. Sembilan dari sepuluh lulusan kami bekerja atau berwirausaha dalam enam bulan.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-5 ek-enter ek-enter-4">
                        <a href="{{ $linkDaftar }}" class="ek-btn ek-btn-gold">Daftar sekarang <i class="fas fa-arrow-right"></i></a>
                        <a href="{{ $linkTentang }}" class="ek-btn ek-btn-ghost"><i class="fas fa-play"></i> Jelajahi kampus</a>
                    </div>

                    <div class="ek-hero-stat ek-enter ek-enter-5">
                        <div><b data-ek-count="1987">0</b><span>Berdiri sejak</span></div>
                        <div><b data-ek-count="42">0</b><span>Program studi</span></div>
                        <div><b data-ek-count="94" data-ek-suffix="%">0</b><span>Terserap kerja</span></div>
                        <div><b>Unggul</b><span>Akreditasi institusi</span></div>
                    </div>
                </div>

                <div class="col-lg-5 ek-enter ek-enter-4">
                    <div class="ek-panel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <strong class="small">Gelombang 1 ditutup dalam</strong>
                            <span class="ek-pill" style="padding:.2rem .7rem; font-size:.75rem">Hemat 25%</span>
                        </div>

                        <div class="ek-count mb-4" id="ekCountdown" data-deadline="{{ $tutupGelombang }}" role="timer">
                            <div><b data-unit="d">00</b><span>Hari</span></div>
                            <div><b data-unit="h">00</b><span>Jam</span></div>
                            <div><b data-unit="m">00</b><span>Menit</span></div>
                            <div><b data-unit="s">00</b><span>Detik</span></div>
                        </div>

                        <p class="small mb-3" style="color: rgba(255,255,255,.75)">
                            Buat akun gratis dan isi formulir bertahap. Data tersimpan otomatis, biaya dibayar hanya saat berkas dikirim.
                        </p>
                        <a href="{{ $linkDaftar }}" class="ek-btn ek-btn-gold w-100">Buat akun pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ===================== PINTASAN KE HALAMAN LAIN ===================== --}}
    <section class="container ek-jump">
        <div class="row g-3">
            @foreach ([
                [$linkProdi, 'fa-graduation-cap', 'Program studi', '42 pilihan, 5 fakultas'],
                [$linkJalur, 'fa-file-signature', 'Cara mendaftar', '4 jalur masuk, semua daring'], // Diperbaiki agar mengarah ke $linkJalur
                [$linkBiaya, 'fa-wallet', 'Biaya kuliah', 'Rincian dan skema cicilan'],
                [$linkBeasiswa, 'fa-hand-holding-heart', 'Beasiswa', 'Potongan 40% sampai penuh'],
            ] as $i => $j)
                <div class="col-sm-6 col-lg-3 ek-reveal" style="transition-delay: {{ $i * 80 }}ms">
                    <a href="{{ $j[0] }}" class="ek-jump-card">
                        <span class="ek-ico"><i class="fas {{ $j[1] }}"></i></span>
                        <span>
                            <strong>{{ $j[2] }}</strong>
                            <span class="ek-meta">{{ $j[3] }}</span>
                        </span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===================== KEUNGGULAN ===================== --}}
    <section class="py-5 mt-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 ek-reveal">
                    <h2 class="ek-heading mb-3">Kampus yang <span class="ek-underline">dipakai, bukan dipajang</span></h2>
                    <p class="ek-lead mb-4">Fasilitas kami terbuka untuk mahasiswa sejak tahun pertama. Tidak ada laboratorium yang hanya dibuka saat akreditasi.</p>
                    <a href="{{ $linkTentang }}" class="ek-btn ek-btn-line">Tentang Universitas Elang Kuasa</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        @foreach ([
                            ['fa-flask', 'Laboratorium buka sampai malam', 'Akses mandiri dengan kartu mahasiswa sampai pukul 22.00, termasuk akhir pekan.'],
                            ['fa-briefcase', 'Magang wajib bergaji', 'Satu semester penuh di 340 perusahaan mitra, dan seluruhnya dibayar.'],
                            ['fa-user-tie', 'Diajar praktisi aktif', 'Empat dari sepuluh mata kuliah keahlian dibawakan orang yang masih bekerja di bidangnya.'],
                            ['fa-globe', 'Satu semester di luar negeri', 'Pertukaran ke 18 kampus mitra di Asia dan Eropa, biaya kuliah tetap dibayar di sini.'],
                        ] as $i => $k)
                            <div class="col-md-6 ek-reveal" style="transition-delay: {{ $i * 80 }}ms">
                                <div class="ek-plus">
                                    <span class="ek-ico mb-3"><i class="fas {{ $k[0] }}"></i></span>
                                    <h3 class="h6 mb-2">{{ $k[1] }}</h3>
                                    <p class="ek-meta mb-0">{{ $k[2] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== ANGKA ===================== --}}
    <section class="py-5" style="background: var(--ek-mist)">
        <div class="container">
            <div class="row g-4 text-center ek-reveal ek-angka">
                @foreach ([
                    ['18500', '', 'Mahasiswa aktif'],
                    ['340', '', 'Perusahaan mitra magang'],
                    ['62', '%', 'Mahasiswa menerima beasiswa'],
                    ['86000', '', 'Alumni tersebar di Indonesia'],
                ] as $a)
                    <div class="col-6 col-lg-3">
                        <b data-ek-count="{{ $a[0] }}" data-ek-suffix="{{ $a[1] }}">0</b>
                        <span>{{ $a[2] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== FAKULTAS (INTERAKTIF) ===================== --}}
    <section class="py-5" id="fakultas">
        <div class="container">
            <div class="ek-reveal mb-4" style="max-width: 62ch">
                <h2 class="ek-heading mb-3">Lima fakultas, <span class="ek-underline">42 program studi</span></h2>
                <p class="ek-lead mb-0">Pilih fakultas untuk melihat program studi di dalamnya.</p>
            </div>

            <div class="row g-4 ek-reveal">
                <div class="col-lg-4">
                    <div class="ek-tabs" role="tablist" aria-label="Daftar fakultas">
                        @foreach ($fakultas as $i => $f)
                            <button type="button" class="ek-tab {{ $i === 0 ? 'is-on' : '' }}"
                                    role="tab" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-controls="ekFak{{ $i }}" data-tab="{{ $i }}">
                                <span class="ek-ico"><i class="fas {{ $f['ikon'] }}"></i></span>
                                {{ $f['nama'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-8">
                    @foreach ($fakultas as $i => $f)
                        <div class="ek-panel-fak" id="ekFak{{ $i }}" role="tabpanel" data-panel="{{ $i }}" {{ $i === 0 ? '' : 'hidden' }}>
                            <h3 class="h4 mb-2">Fakultas {{ $f['nama'] }}</h3>
                            <p class="ek-lead mb-4">{{ $f['ringkas'] }}</p>
                            <div class="ek-meta mb-2">Program studi:</div>
                            <div class="mb-4">
                                @foreach ($f['prodi'] as $p)
                                    <span class="ek-prodi-tag">{{ $p }}</span>
                                @endforeach
                            </div>
                            <a href="{{ $linkProdi }}" class="ek-btn ek-btn-navy">Lihat kurikulum dan prospek kerja <i class="fas fa-arrow-right"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== SUARA ALUMNI ===================== --}}
    <section class="py-5">
        <div class="container">
            <div class="ek-say ek-reveal" id="ekSay">
                <div class="row g-4">
                    <div class="col-lg-8">
                        @foreach ($alumni as $i => $a)
                            <div class="ek-slide" data-slide="{{ $i }}" {{ $i === 0 ? '' : 'hidden' }}>
                                <p class="ek-quote mb-4">&ldquo;{{ $a['kata'] }}&rdquo;</p>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="ek-avatar">{{ \Illuminate\Support\Str::substr($a['nama'], 0, 1) }}</span>
                                    <span>
                                        <strong class="d-block">{{ $a['nama'] }}</strong>
                                        <span class="ek-meta" style="color: rgba(255,255,255,.65)">{{ $a['prodi'] }} &middot; {{ $a['kerja'] }}</span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 d-flex flex-lg-column justify-content-between align-items-lg-end gap-3">
                        <div class="d-flex gap-2" id="ekDots">
                            @foreach ($alumni as $i => $a)
                                <button type="button" class="ek-nav-dot {{ $i === 0 ? 'is-on' : '' }}" data-dot="{{ $i }}"
                                        aria-label="Cerita alumni {{ $i + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="ek-arrow" id="ekPrev" aria-label="Sebelumnya"><i class="fas fa-chevron-left"></i></button>
                            <button type="button" class="ek-arrow" id="ekNext" aria-label="Berikutnya"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== BERITA & AGENDA ===================== --}}
    <section class="py-5" style="background: var(--ek-mist)">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7 ek-reveal">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <h2 class="ek-heading mb-0">Kabar kampus</h2>
                        <a href="{{ $linkBerita }}" class="ek-meta fw-bold text-decoration-none" style="color: var(--ek-navy)">Semua berita <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                    @foreach ($berita as $b)
                        <a href="{{ $linkBerita }}" class="ek-news">
                            <span class="ek-kat">{{ $b['kategori'] }}</span>
                            <span class="ek-meta ms-2">{{ $b['tanggal'] }}</span>
                            <h3>{{ $b['judul'] }}</h3>
                        </a>
                    @endforeach
                </div>

                <div class="col-lg-5 ek-reveal" style="transition-delay: 100ms">
                    <h2 class="ek-heading mb-3">Agenda terdekat</h2>
                    @foreach ($agenda as $ag)
                        <div class="ek-agenda">
                            <span class="ek-tgl"><b>{{ $ag['tgl'] }}</b><span>{{ $ag['bln'] }}</span></span>
                            <span>
                                <strong class="d-block" style="font-size:.95rem">{{ $ag['judul'] }}</strong>
                                <span class="ek-meta"><i class="fas fa-location-dot me-1"></i>{{ $ag['tempat'] }}</span>
                            </span>
                        </div>
                    @endforeach
                    <a href="{{ $linkKontak }}" class="ek-btn ek-btn-line mt-4">Daftar ikut kampus terbuka</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CTA PENUTUP ===================== --}}
    <section class="py-5">
        <div class="container">
            <div class="ek-cta p-4 p-lg-5 ek-reveal">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h2 class="ek-heading text-white mb-3">Masih menimbang? Lihat dulu kampusnya.</h2>
                        <p class="mb-0" style="color: rgba(255,255,255,.75); max-width: 58ch">
                            Kampus terbuka digelar setiap Sabtu pertama. Kamu bisa masuk kelas, mencoba laboratorium, dan bertanya langsung ke mahasiswa aktif — tanpa biaya.
                        </p>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <a href="{{ $linkDaftar }}" class="ek-btn ek-btn-gold">Daftar sekarang <i class="fas fa-arrow-right"></i></a>
                        <a href="{{ $linkKontak }}" class="ek-btn ek-btn-ghost"><i class="fab fa-whatsapp"></i> Tanya panitia</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <button type="button" class="ek-top" id="ekTop" aria-label="Kembali ke atas"><i class="fas fa-arrow-up"></i></button>
</div>

@verbatim
<script>
(function () {
    'use strict';

    const root = document.querySelector('.ek');
    if (!root) return;
    const hematGerak = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* 1. Animasi masuk saat digulir (sekali jalan) -------------------------- */
    const pengamat = new IntersectionObserver((entries, obs) => {
        entries.forEach((e) => {
            if (!e.isIntersecting) return;
            e.target.classList.add('is-in');
            obs.unobserve(e.target);
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
    document.querySelectorAll('.ek-reveal').forEach((el) => pengamat.observe(el));

    /* 2. Angka yang menghitung naik ----------------------------------------- */
    const hitung = (el) => {
        const target = parseInt(el.dataset.ekCount, 10);
        const suffix = el.dataset.ekSuffix || '';
        if (hematGerak) { el.textContent = target.toLocaleString('id-ID') + suffix; return; }
        const durasi = 1500, mulai = performance.now();
        const step = (now) => {
            const p = Math.min(1, (now - mulai) / durasi);
            const eased = 1 - Math.pow(1 - p, 3);
            const nilai = Math.round(target * eased);
            el.textContent = (target > 1999 ? nilai.toLocaleString('id-ID') : nilai) + suffix;
            if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    };
    const pengamatAngka = new IntersectionObserver((entries, obs) => {
        entries.forEach((e) => { if (e.isIntersecting) { hitung(e.target); obs.unobserve(e.target); } });
    }, { threshold: 0.5 });
    document.querySelectorAll('[data-ek-count]').forEach((el) => pengamatAngka.observe(el));

    /* 3. Hitung mundur ------------------------------------------------------- */
    const kotak = document.getElementById('ekCountdown');
    if (kotak) {
        const batas = new Date(kotak.dataset.deadline).getTime();
        const pad = (n) => String(n).padStart(2, '0');
        const set = (u, v) => { const el = kotak.querySelector('[data-unit="' + u + '"]'); if (el) el.textContent = pad(v); };
        const tik = () => {
            const sisa = batas - Date.now();
            if (sisa <= 0) {
                kotak.innerHTML = '<div style="grid-column:1/-1"><b>Ditutup</b><span>Gelombang berikutnya segera dibuka</span></div>';
                clearInterval(timer);
                return;
            }
            set('d', Math.floor(sisa / 86400000));
            set('h', Math.floor(sisa / 3600000) % 24);
            set('m', Math.floor(sisa / 60000) % 60);
            set('s', Math.floor(sisa / 1000) % 60);
        };
        tik();
        var timer = setInterval(tik, 1000);
    }

    /* 4. Tab fakultas -------------------------------------------------------- */
    const tabs = [...document.querySelectorAll('[data-tab]')];
    const panels = [...document.querySelectorAll('[data-panel]')];
    const bukaTab = (idx) => {
        tabs.forEach((t) => {
            const on = t.dataset.tab === String(idx);
            t.classList.toggle('is-on', on);
            t.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        panels.forEach((p) => {
            const on = p.dataset.panel === String(idx);
            p.hidden = !on;
            if (on) { p.classList.remove('ek-fade'); void p.offsetWidth; p.classList.add('ek-fade'); }
        });
    };
    tabs.forEach((t) => {
        t.addEventListener('click', () => bukaTab(t.dataset.tab));
        t.addEventListener('keydown', (e) => {
            const i = tabs.indexOf(t);
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight') { e.preventDefault(); tabs[(i + 1) % tabs.length].focus(); bukaTab((i + 1) % tabs.length); }
            if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') { e.preventDefault(); const p = (i - 1 + tabs.length) % tabs.length; tabs[p].focus(); bukaTab(p); }
        });
    });

    /* 5. Cerita alumni (geser otomatis, berhenti saat disentuh) --------------- */
    const say = document.getElementById('ekSay');
    if (say) {
        const slides = [...say.querySelectorAll('[data-slide]')];
        const dots = [...say.querySelectorAll('[data-dot]')];
        let aktif = 0, auto = null;

        const ke = (i) => {
            aktif = (i + slides.length) % slides.length;
            slides.forEach((s, n) => {
                s.hidden = n !== aktif;
                if (n === aktif) { s.classList.remove('ek-fade'); void s.offsetWidth; s.classList.add('ek-fade'); }
            });
            dots.forEach((d, n) => d.classList.toggle('is-on', n === aktif));
        };

        const mulaiAuto = () => { if (!hematGerak) auto = setInterval(() => ke(aktif + 1), 7000); };
        const hentiAuto = () => { clearInterval(auto); auto = null; };

        dots.forEach((d) => d.addEventListener('click', () => { hentiAuto(); ke(parseInt(d.dataset.dot, 10)); mulaiAuto(); }));
        document.getElementById('ekNext').addEventListener('click', () => { hentiAuto(); ke(aktif + 1); mulaiAuto(); });
        document.getElementById('ekPrev').addEventListener('click', () => { hentiAuto(); ke(aktif - 1); mulaiAuto(); });
        say.addEventListener('mouseenter', hentiAuto);
        say.addEventListener('mouseleave', mulaiAuto);
        say.addEventListener('focusin', hentiAuto);

        // geser dengan jari di layar sentuh
        let x0 = null;
        say.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; hentiAuto(); }, { passive: true });
        say.addEventListener('touchend', (e) => {
            if (x0 === null) return;
            const d = e.changedTouches[0].clientX - x0;
            if (Math.abs(d) > 50) ke(aktif + (d < 0 ? 1 : -1));
            x0 = null; mulaiAuto();
        });

        mulaiAuto();
    }

    /* 6. Tombol kembali ke atas ---------------------------------------------- */
    const tombolAtas = document.getElementById('ekTop');
    if (tombolAtas) {
        let menunggu = false;
        window.addEventListener('scroll', () => {
            if (menunggu) return;
            menunggu = true;
            requestAnimationFrame(() => {
                tombolAtas.classList.toggle('is-on', window.scrollY > window.innerHeight);
                menunggu = false;
            });
        }, { passive: true });
        tombolAtas.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: hematGerak ? 'auto' : 'smooth' });
        });
    }
})();
</script>
@endverbatim
@endsection