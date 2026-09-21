# 🎓 Universitas Elang Kuasa — Website PMB & Portal Akademik

Website resmi Penerimaan Mahasiswa Baru (PMB) dan Sistem Informasi Akademik **Universitas Elang Kuasa**, dibangun menggunakan framework **Laravel** dengan antarmuka modern berbasis **Bootstrap 5** dan **FontAwesome**.

---

## 🚀 Fitur Utama

- **Halaman Beranda (Home)**: Menampilkan informasi sambutan, hitung mundur gelombang pendaftaran, keunggulan kampus, dan akses cepat.
- **Direktori Akademik & Fakultas**: Menyajikan informasi mendalam mengenai 5 fakultas dan 21 program studi terakreditasi.
- **Detail Jurusan Dinamis**: Halaman khusus tiap program studi yang memuat deskripsi lengkap, kegiatan mahasiswa, prospek karir, hingga daftar dosen pengajar.
- **Informasi PMB**: Panduan pendaftaran, jalur masuk, rincian biaya perkuliahan transparan, serta program beasiswa.
- **Formulir Pendaftaran Online**: Formulir pendaftaran mahasiswa baru yang terintegrasi penuh dengan database MySQL (`web_pmb`) lengkap dengan sistem validasi data.
- **Portal Pendukung**: Halaman informasi Karir, Alumni, Berita & Event kampus, serta Login Mahasiswa.

---

## 🛠️ Tech Stack

- **Framework Backend**: Laravel (PHP 8.3+)
- **Database**: MySQL (Manajemen via Laragon)
- **Frontend / UI**: Bootstrap 5.3, Blade Templating Engine
- **Ikon & Visual**: FontAwesome 6

---

## 📂 Struktur Direktori Utama

```text
web-pmb/
├── app/
│   ├── Http/Controllers/
│   │   ├── JurusanController.php       # Mengelola data & halaman detail 21 prodi
│   │   └── PendaftaranController.php   # Mengelola logika form & database PMB
│   └── Models/
│       └── Pendaftaran.php             # Model Eloquent untuk data pendaftar
├── database/
│   └── migrations/                     # Migrasi tabel database pendaftaran & sesi
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Master layout (Navbar, Footer, Top-bar)
│       ├── pages/                      # Halaman statis & informasi pendukung (Karir, Alumni, Biaya, dll)
│       ├── auth/
│       │   └── login.blade.php         # Halaman login mahasiswa
│       ├── home.blade.php              # Halaman beranda utama
│       ├── akademik.blade.php          # Halaman daftar fakultas & prodi
│       ├── jurusan-detail.blade.php    # Halaman detail informatif tiap jurusan
│       └── pendaftaran.blade.php       # Form pendaftaran mahasiswa baru
└── routes/
    └── web.php                         # Definisi seluruh rute aplikasi web

⚙️ Cara Menjalankan Proyek (Local Setup)
1. Persiapan Awal
Pastikan komputer kamu sudah terpasang Laragon (atau XAMPP) yang di dalamnya sudah mencakup PHP (versi 8.2 ke atas) dan Composer.

2. Langkah-langkah di Terminal / Command Prompt
Buka aplikasi terminal (atau Laragon Terminal) di dalam folder proyek web-pmb kamu, lalu jalankan perintah berikut secara berurutan:

Install dependencies PHP (Composer):

Bash
composer install
Buat dan salin file konfigurasi .env:

Bash
copy .env.example .env
(Atau jika menggunakan sistem macOS/Linux, gunakan perintah cp .env.example .env)

Generate Application Key:

Bash
php artisan key:generate
Konfigurasi Database di file .env:
Buka file .env menggunakan teks editor (seperti VS Code), lalu pastikan pengaturan database MySQL kamu sesuai dengan ini:

Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_pmb
DB_USERNAME=root
DB_PASSWORD=
(Pastikan database dengan nama web_pmb sudah kamu buat sebelumnya melalui phpMyAdmin / Laragon).

Jalankan Migrasi Database:

Bash
php artisan migrate
Jalankan Server Lokal Laravel:

Bash
php artisan serve
Akses Website:
Buka browser internet kamu (Google Chrome, Edge, dll), lalu ketikkan alamat berikut:
[http://127.0.0.1:8000](http://127.0.0.1:8000)

📄 Lisensi
Proyek ini bersifat open-source dan dikembangkan untuk keperluan demonstrasi sistem informasi universitas.
