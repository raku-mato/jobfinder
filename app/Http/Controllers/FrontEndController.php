<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Kategori;
use App\Models\Lokasi;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ARAHKAN KE FOLDER FRONTEND INDEX
        $namaWebsite = "JobFinder";
        $pekerjaan = Pekerjaan::with(['lokasi', 'kategori'])->latest()->paginate(5);
        return view ('FrontEnd.index', ['namaWebsite' => $namaWebsite, 'pekerjaan' => $pekerjaan]);
    }

    public function all() {
        return "HELLO";
        $namaWebsite = "JobFinder";
        $pekerjaan = Pekerjaan::with(['lokasi', 'kategori'])->latest()->paginate(5);
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        return view('FrontEnd.all',['namaWebsite' => $namaWebsite, 'pekerjaan' => $pekerjaan, 'kategori' => $kategori, 'lokasi' => $lokasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
