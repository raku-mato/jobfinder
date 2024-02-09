<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    //definisikan table
    protected $table = "pekerjaan";
    protected $fillable = ["nama_pekerjaan", "gambar", "kategori_id", "lokasi_id", "besaran_gaji", "deskripsi", "nama_perusahaan", "durasi_lamaran"];
}
