@extends('layouts.app')

@section('title', 'Formulir Pendaftaran - Universitas Elang Kuasa')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Header + penjelasan singkat agar pengguna tahu apa yang akan diisi --}}
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-2" style="color: var(--primary-blue);">Formulir Pendaftaran Mahasiswa Baru</h3>
                <p class="text-muted mb-0">
                    Isi data di bawah ini dengan benar. Proses hanya membutuhkan waktu
                    <strong>kurang dari 5 menit</strong> dan tim kami akan menghubungi Anda melalui WhatsApp/email.
                </p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-4 px-4 mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger rounded-4 px-4 mb-4" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Ada beberapa data yang perlu diperbaiki sebelum formulir bisa dikirim. Silakan periksa kembali kolom yang ditandai merah di bawah.
                    </div>
                @endif

                <form action="{{ route('pendaftaran.store') }}" method="POST" novalidate>
                    @csrf

                    {{-- ===== Bagian 1: Data Diri ===== --}}
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle bg-primary text-white" style="width:28px;height:28px;line-height:20px;">1</span>
                        <h6 class="fw-bold mb-0">Data Diri</h6>
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label fw-bold">
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                                <i class="fas fa-user text-muted"></i>
                            </span>
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                class="form-control border-start-0 rounded-end-pill py-2 px-3 @error('nama_lengkap') is-invalid @enderror"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Contoh: Budi Santoso"
                                required>
                        </div>
                        <div class="form-text ms-2">Tulis sesuai nama pada ijazah/rapor terakhir.</div>
                        @error('nama_lengkap')
                            <div class="text-danger small ms-2 mt-1"><i class="fas fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">
                                Email <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" id="email" name="email"
                                    class="form-control border-start-0 rounded-end-pill py-2 px-3 @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    required>
                            </div>
                            <div class="form-text ms-2">Info kelulusan seleksi akan dikirim ke email ini.</div>
                            @error('email')
                                <div class="text-danger small ms-2 mt-1"><i class="fas fa-circle-exclamation me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="whatsapp" class="form-label fw-bold">
                                Nomor WhatsApp <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                                    <i class="fab fa-whatsapp text-muted"></i>
                                </span>
                                <input type="tel" id="whatsapp" name="whatsapp" inputmode="numeric"
                                    class="form-control border-start-0 rounded-end-pill py-2 px-3 @error('whatsapp') is-invalid @enderror"
                                    value="{{ old('whatsapp') }}"
                                    placeholder="08xxxxxxxxxx"
                                    pattern="[0-9]{10,15}"
                                    required>
                            </div>
                            <div class="form-text ms-2">Gunakan nomor aktif, contoh: 081234567890.</div>
                            @error('whatsapp')
                                <div class="text-danger small ms-2 mt-1"><i class="fas fa-circle-exclamation me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- ===== Bagian 2: Program Studi ===== --}}
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle bg-primary text-white" style="width:28px;height:28px;line-height:20px;">2</span>
                        <h6 class="fw-bold mb-0">Pilihan Program Studi</h6>
                    </div>

                    <div class="mb-4">
                        <label for="program_studi" class="form-label fw-bold">
                            Program Studi <span class="text-danger">*</span>
                        </label>
                        <select id="program_studi" name="program_studi"
                            class="form-select rounded-pill py-2 px-3 @error('program_studi') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>-- Pilih salah satu program studi --</option>
                            
                            <optgroup label="Fakultas Teknik">
                                <option value="Teknik Informatika" {{ old('program_studi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                <option value="Teknik Sipil" {{ old('program_studi') == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                                <option value="Teknik Elektro" {{ old('program_studi') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                                <option value="Teknik Industri" {{ old('program_studi') == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
                                <option value="Arsitektur" {{ old('program_studi') == 'Arsitektur' ? 'selected' : '' }}>Arsitektur</option>
                            </optgroup>

                            <optgroup label="Fakultas Ekonomi & Bisnis">
                                <option value="Manajemen Bisnis" {{ old('program_studi') == 'Manajemen Bisnis' ? 'selected' : '' }}>Manajemen Bisnis</option>
                                <option value="Akuntansi" {{ old('program_studi') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                                <option value="Bisnis Digital" {{ old('program_studi') == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                <option value="Ekonomi Pembangunan" {{ old('program_studi') == 'Ekonomi Pembangunan' ? 'selected' : '' }}>Ekonomi Pembangunan</option>
                            </optgroup>

                            <optgroup label="Fakultas Kedokteran">
                                <option value="Kedokteran" {{ old('program_studi') == 'Kedokteran' ? 'selected' : '' }}>Kedokteran</option>
                                <option value="Farmasi" {{ old('program_studi') == 'Farmasi' ? 'selected' : '' }}>Farmasi</option>
                                <option value="Ilmu Keperawatan" {{ old('program_studi') == 'Ilmu Keperawatan' ? 'selected' : '' }}>Ilmu Keperawatan</option>
                                <option value="Gizi" {{ old('program_studi') == 'Gizi' ? 'selected' : '' }}>Gizi</option>
                            </optgroup>

                            <optgroup label="Fakultas Hukum & Sosial">
                                <option value="Ilmu Hukum" {{ old('program_studi') == 'Ilmu Hukum' ? 'selected' : '' }}>Ilmu Hukum</option>
                                <option value="Ilmu Komunikasi" {{ old('program_studi') == 'Ilmu Komunikasi' ? 'selected' : '' }}>Ilmu Komunikasi</option>
                                <option value="Hubungan Internasional" {{ old('program_studi') == 'Hubungan Internasional' ? 'selected' : '' }}>Hubungan Internasional</option>
                                <option value="Psikologi" {{ old('program_studi') == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>
                            </optgroup>

                            <optgroup label="Fakultas Ilmu Pendidikan">
                                <option value="PGSD" {{ old('program_studi') == 'PGSD' ? 'selected' : '' }}>PGSD</option>
                                <option value="Pendidikan Bahasa Inggris" {{ old('program_studi') == 'Pendidikan Bahasa Inggris' ? 'selected' : '' }}>Pendidikan Bahasa Inggris</option>
                                <option value="Pendidikan Matematika" {{ old('program_studi') == 'Pendidikan Matematika' ? 'selected' : '' }}>Pendidikan Matematika</option>
                                <option value="PAUD" {{ old('program_studi') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                            </optgroup>
                        </select>
                        <div class="form-text ms-2">Pilihan ini bisa didiskusikan lagi saat proses wawancara.</div>
                        @error('program_studi')
                            <div class="text-danger small ms-2 mt-1"><i class="fas fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    {{-- ===== Bagian 3: Alamat ===== --}}
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle bg-primary text-white" style="width:28px;height:28px;line-height:20px;">3</span>
                        <h6 class="fw-bold mb-0">Alamat Domisili</h6>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-bold">
                            Alamat Lengkap <span class="text-danger">*</span>
                        </label>
                        <textarea id="alamat" name="alamat"
                            class="form-control rounded-4 p-3 @error('alamat') is-invalid @enderror"
                            rows="3"
                            placeholder="Contoh: Jl. Merdeka No. 10, RT 01/RW 02, Kel. Sukajadi, Kec. Sukasari, Kota Bandung, Jawa Barat"
                            required>{{ old('alamat') }}</textarea>
                        <div class="form-text ms-2">Tulis alamat tempat tinggal Anda saat ini (boleh berbeda dari alamat KTP).</div>
                        @error('alamat')
                            <div class="text-danger small ms-2 mt-1"><i class="fas fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold py-3 rounded-pill">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran Sekarang
                    </button>

                    <p class="text-center text-muted small mt-3 mb-0">
                        <i class="fas fa-lock me-1"></i>Data Anda aman dan hanya digunakan untuk keperluan pendaftaran.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Sedikit CSS tambahan agar tampilan lebih rapi di layar kecil --}}
<style>
    @media (max-width: 576px) {
        .card { padding: 1.5rem !important; }
        h3 { font-size: 1.35rem; }
    }
    .input-group-text { background-color: #fff; }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    .is-invalid { border-color: #dc3545 !important; }
</style>
@endsection