<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:15',
            'program_studi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'program_studi' => $request->program_studi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil dikirim! Silakan cek email untuk instruksi selanjutnya.');
    }
}