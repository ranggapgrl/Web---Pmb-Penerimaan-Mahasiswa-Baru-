<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\JurusanController;

// Halaman Utama
Route::view('/', 'home')->name('home');

// Halaman di dalam folder 'pages'
Route::view('/tentang-kami', 'pages.tentang')->name('tentang');
Route::view('/jalur-pendaftaran', 'pages.jalur')->name('jalur');
Route::view('/program-beasiswa', 'pages.beasiswa')->name('beasiswa');
Route::view('/petunjuk-pendaftaran', 'pages.petunjuk')->name('petunjuk');
Route::view('/biaya-perkuliahan', 'pages.biaya')->name('biaya');
Route::view('/karir', 'pages.karir')->name('karir');
Route::view('/alumni', 'pages.alumni')->name('alumni');
Route::view('/berita', 'pages.berita')->name('berita');

// Halaman Akademik & Detail Jurusan (Menggunakan Controller)
Route::get('/akademik', [JurusanController::class, 'index'])->name('akademik');
Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');

// Halaman Form Pendaftaran (Terintegrasi Database)
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

// Halaman Login Mahasiswa
Route::view('/login-mahasiswa', 'auth.login')->name('login');