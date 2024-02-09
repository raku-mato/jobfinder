<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi
        $request->validate([
            'judul' => 'required|max:45',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        //Insert Data
        DB::table('about')->insert([
            'judul' => $request['judul'],
            'subjudul' => $request['subjudul'],
            'deskripsi' => $request['deskripsi'],
            'gambar' => $request['gambar'],
        ]);

        //Redirect ke halaman /about 
        return redirect('/about');
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
