<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';
    
    protected $fillable = [
        'nama_lengkap',
        'email',
        'whatsapp',
        'program_studi',
        'alamat'
    ];
}