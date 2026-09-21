@extends('layouts.app')

@section('title', 'Petunjuk Pendaftaran - Universitas Elang Kuasa')

@section('content')
@php
    /*
    |--------------------------------------------------------------------------
    | DATA HALAMAN - SEMUA ISI DI BAWAH INI ADALAH CONTOH
    |--------------------------------------------------------------------------
    | Ganti dengan aturan dan data resmi universitas sebelum dipublikasikan.
    | Tampilan di bawahnya otomatis mengikuti isi data ini.
    */

    // Link portal PMB / formulir pendaftaran. Isi jika sudah ada.
    // Jika dikosongkan (null), tombol "Mulai Daftar" menuju bagian alur di halaman ini.
    $linkPortal = null;

    $estimasi = 'Sekitar 30 menit';

    $berkas = [
        ['ikon' => 'fa-envelope',   'judul' => 'Email aktif',      'ket' => 'Untuk verifikasi akun dan pemberitahuan dari panitia'],
        ['ikon' => 'fa-mobile-alt', 'judul' => 'Nomor HP aktif',   'ket' => 'Sebaiknya terhubung dengan WhatsApp'],
        ['ikon' => 'fa-file-alt',   'judul' => 'Scan rapor',       'ket' => 'Semua halaman nilai, format PDF'],
        ['ikon' => 'fa-camera',     'judul' => 'Pas foto',         'ket' => 'Latar polos, berwarna, format JPG'],
        ['ikon' => 'fa-id-card',    'judul' => 'Kartu identitas',  'ket' => 'KTP, KK, atau kartu pelajar'],
    ];

    $langkah = [
        [
            'judul'     => 'Buat akun PMB',
            'deskripsi' => 'Buka portal PMB, pilih Daftar Akun, lalu isi email dan nomor HP aktif. Kode verifikasi dikirim ke email atau HP tersebut. Akun ini kamu pakai sampai hari pengumuman.',
            'tips'      => 'Pakai email yang rutin kamu buka, karena pemberitahuan dari panitia dikirim ke sana.',
        ],
        [
            'judul'     => 'Isi formulir pendaftaran',
            'deskripsi' => 'Masuk ke akun, lalu lengkapi data diri dan asal sekolah. Setelah itu pilih program studi yang kamu tuju.',
            'tips'      => 'Tulis nama dan tanggal lahir persis seperti di kartu identitas, karena data ini dipakai untuk dokumen resmi.',
        ],
        [
            'judul'     => 'Unggah berkas',
            'deskripsi' => 'Unggah scan rapor, pas foto, dan dokumen pendukung lainnya. Pastikan tulisan pada berkas terbaca jelas.',
            'tips'      => 'Siapkan semua berkas dalam bentuk PDF atau JPG sebelum mulai, supaya kamu tidak berhenti di tengah jalan.',
        ],
        [
            'judul'     => 'Lihat pengumuman',
            'deskripsi' => 'Cek hasil seleksi langsung dari akun PMB pada tanggal pengumuman.',
            'tips'      => 'Simpan bukti pengumuman (screenshot atau cetak) untuk keperluan proses berikutnya.',
        ],
    ];

    $jikaLulus = [
        'Cetak bukti kelulusan dari akun PMB.',
        'Lakukan daftar ulang dan selesaikan pembayaran sesuai petunjuk panitia.',
        'Ikuti kegiatan orientasi mahasiswa baru.',
    ];
    $jikaBelumLulus = [
        'Cek jadwal gelombang pendaftaran berikutnya.',
        'Pilih program studi lain yang masih dibuka.',
        'Hubungi panitia kalau kamu butuh saran.',
    ];

    $faq = [
        ['tanya' => 'Apa itu PMB?',
         'jawab' => 'PMB adalah singkatan dari Penerimaan Mahasiswa Baru, yaitu proses pendaftaran dan seleksi calon mahasiswa baru di Universitas Elang Kuasa.'],
        ['tanya' => 'Saya lupa password akun PMB. Bagaimana caranya?',
         'jawab' => 'Pilih Lupa Password di halaman masuk. Tautan untuk membuat password baru akan dikirim ke email yang kamu pakai saat membuat akun.'],
        ['tanya' => 'Apa format dan ukuran berkas yang boleh diunggah?',
         'jawab' => 'Gunakan PDF untuk dokumen dan JPG untuk foto, dengan ukuran maksimal 2 MB per berkas.'],
        ['tanya' => 'Saya salah mengisi data. Apakah bisa diubah?',
         'jawab' => 'Hubungi panitia lewat kontak di bagian bawah halaman ini sebelum masa pendaftaran ditutup, dan sebutkan data mana yang perlu diperbaiki.'],
        ['tanya' => 'Kapan pengumuman hasil seleksi?',
         'jawab' => 'Tanggal pengumuman mengikuti jadwal gelombang yang berlaku. Informasi terbaru disampaikan lewat portal PMB dan email.'],
    ];

    $kontak = [
        'whatsapp' => '+62 812-3456-7890',
        'email'    => 'pmb@example.ac.id',
        'jam'      => 'Senin sampai Jumat, 08.00 sampai 16.00 WIB',
    ];
    $linkWa = 'https://wa.me/' . preg_replace('/\D/', '', $kontak['whatsapp']);

    $tombolMulai = $linkPortal ?: '#alur';
@endphp

<style>
    .scroll-target { scroll-margin-top: 90px; }

    .ikon-kotak {
        width: 48px; height: 48px; flex: 0 0 48px;
        display: flex; align-items: center; justify-content: center;
        border-radius: .75rem; font-size: 1.15rem;
        background-color: var(--primary-blue); color: #ffc107;
    }

    /* Alur langkah vertikal */
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

    /* FAQ tanpa JavaScript */
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
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">Cara mendaftar sebagai mahasiswa baru</h1>
                <p class="lead mb-4">
                    Pendaftaran dilakukan online lewat portal PMB (Penerimaan Mahasiswa Baru).
                    Siapkan berkasmu lebih dulu, lalu ikuti empat langkah di bawah.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="{{ $tombolMulai }}" @if($linkPortal) target="_blank" rel="noopener" @endif
                       class="btn btn-warning btn-lg fw-bold rounded-pill px-4">Mulai Daftar</a>
                    <span class="text-white-50">
                        <i class="fas fa-list-ol me-1" aria-hidden="true"></i> {{ count($langkah) }} langkah
                        <i class="fas fa-clock ms-3 me-1" aria-hidden="true"></i> {{ $estimasi }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Siapkan dulu -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Siapkan dulu sebelum mendaftar</h2>
        <p class="text-muted mb-4">Kalau semua ini sudah ada di tanganmu, pendaftaran bisa selesai dalam sekali duduk.</p>

        <div class="row g-4">
            @foreach($berkas as $item)
            <div class="col-md-6 col-lg-4">
                <div class="d-flex align-items-start">
                    <div class="ikon-kotak me-3">
                        <i class="fas {{ $item['ikon'] }}" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3 class="h6 fw-bold mb-1">{{ $item['judul'] }}</h3>
                        <p class="text-muted small mb-0">{{ $item['ket'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Alur langkah -->
<section id="alur" class="py-5 bg-light scroll-target">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Alur pendaftaran</h2>
        <p class="text-muted mb-5">Ikuti langkah berikut secara berurutan.</p>

        <div style="max-width: 760px;">
            @foreach($langkah as $i => $item)
            <div class="alur-item">
                <div class="alur-nomor" aria-hidden="true">{{ $i + 1 }}</div>
                <div>
                    <h3 class="h5 fw-bold mb-2"><span class="visually-hidden">Langkah {{ $i + 1 }}: </span>{{ $item['judul'] }}</h3>
                    <p class="mb-2">{{ $item['deskripsi'] }}</p>
                    @if(!empty($item['tips']))
                        <p class="small text-muted mb-0">
                            <i class="fas fa-lightbulb text-warning me-1" aria-hidden="true"></i>{{ $item['tips'] }}
                        </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Setelah pengumuman -->
<section class="py-5">
    <div class="container py-3">
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">Setelah pengumuman</h2>
        <p class="text-muted mb-4">Apa yang dilakukan berikutnya tergantung hasil seleksi.</p>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="border rounded-3 p-4 h-100">
                    <h3 class="h5 fw-bold mb-3"><i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>Kalau kamu lulus</h3>
                    <ul class="mb-0 ps-3">
                        @foreach($jikaLulus as $baris)
                            <li class="mb-2">{{ $baris }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border rounded-3 p-4 h-100">
                    <h3 class="h5 fw-bold mb-3"><i class="fas fa-redo text-primary me-2" aria-hidden="true"></i>Kalau belum lulus</h3>
                    <ul class="mb-0 ps-3">
                        @foreach($jikaBelumLulus as $baris)
                            <li class="mb-2">{{ $baris }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pertanyaan yang sering diajukan -->
<section class="py-5 bg-light">
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

<!-- Bantuan -->
<section class="py-5 text-white" style="background-color: var(--primary-blue);">
    <div class="container py-3">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-2">Masih bingung? Tanya panitia</h2>
                <p class="mb-0 text-white-50">Layanan: {{ $kontak['jam'] }}</p>
            </div>
            <div class="col-lg-6 d-flex flex-wrap gap-2 justify-content-lg-end">
                <a href="{{ $linkWa }}" target="_blank" rel="noopener" class="btn btn-warning fw-bold rounded-pill px-4">
                    <i class="fab fa-whatsapp me-1" aria-hidden="true"></i> {{ $kontak['whatsapp'] }}
                </a>
                <a href="mailto:{{ $kontak['email'] }}" class="btn btn-outline-light rounded-pill px-4">
                    <i class="fas fa-envelope me-1" aria-hidden="true"></i> {{ $kontak['email'] }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection