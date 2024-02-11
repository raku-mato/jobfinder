<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'nama_pekerjaan',
        'nama_perusahaan',
        'deskripsi',
        'gambar',
        'kategori_id',
        'lokasi_id',
        'besaran_gaji',
        'durasi_lamaran'
    ];
}
