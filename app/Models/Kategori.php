<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kategori extends Model
{
    use HasFactory;
    //definisikan table
    protected $table = "kategori";
    protected $fillable = ["nama_kategori"];

    public function pekerjaan(): HasOne
    {
        return $this->hasOne(pekerjaan::class)->withDefault();
    }
}
