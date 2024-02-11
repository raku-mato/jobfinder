<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lokasi extends Model
{
    use HasFactory;
    //definisikan table
    protected $table = "lokasi";
    protected $fillable = ["nama_lokasi"];

    public function pekerjaan(): HasOne
    {
        return $this->hasOne(pekerjaan::class)->withDefault();
    }
}
