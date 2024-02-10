<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->string('nama_perusahaan');
            $table->text('deskripsi');
            $table->string('gambar');

            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');

            $table->unsignedBigInteger('lokasi_id');
            $table->foreign('lokasi_id')->references('id')->on('lokasi');

            $table->integer('besaran_gaji');
            $table->integer('durasi_lamaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
