@extends('layouts.app')

@section('title', 'Login Mahasiswa - Universitas Elang Kuasa')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3 text-warning shadow-sm" style="width: 70px; height: 70px; align-items: center; justify-content: center;">
                        <i class="fas fa-user-lock fs-2"></i>
                    </div>
                    <h3 class="fw-bold" style="color: var(--primary-blue);">Login Mahasiswa</h3>
                    <p class="text-muted small">Masuk menggunakan NIM dan password akun portal akademikmu.</p>
                </div>

                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Nomor Induk Mahasiswa (NIM)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-id-card text-muted"></i></span>
                            <input type="text" name="nim" class="form-control border-start-0 bg-light py-2" placeholder="Contoh: 202601001" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control border-start-0 bg-light py-2" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 small">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label text-muted" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="text-decoration-none fw-bold" style="color: var(--primary-blue);">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold py-2 rounded-pill shadow-sm text-dark">Masuk Portal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection