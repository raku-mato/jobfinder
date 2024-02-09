<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\Pekerjaan;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //arahkan ke folder Dashboard/Job/index
        $judul = "Dashboard Admin";
        $namaHalaman = "Job";
        //ambil data pekerjaan dengan nama lokasi
        $pekerjaan = Pekerjaan::with(['lokasi', 'kategori'])->latest()->paginate(5);
        return view('Dashboard.Job.index', ['judul' => $judul, 'namaHalaman' => $namaHalaman, 'pekerjaan' => $pekerjaan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //arahkan ke halaman Dashboard>Job>create
        $judul = "Dashboard Admin";
        $namaHalaman = "Tambah Lowongan Pekerjaan Baru";
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();
        return view('Dashboard.Job.create', ['judul' => $judul, 'namaHalaman' => $namaHalaman, 'lokasi' => $lokasi, 'kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //masukkan data ke dalam tabel pekerjaan
        $request->validate([
            'nama_pekerjaan' => 'required',
            'besaran_gaji' => 'required',
            'nama_perusahaan' => 'required',
            'durasi_lamaran' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'lokasi_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required'
        ]);

        // Ambil nama gambar dan pindahkan gambar dalam folder public/pekerjaan
        $namaFileGambar = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('pekerjaan'), $namaFileGambar);

        $pekerjaan = new Pekerjaan;
        $pekerjaan->nama_pekerjaan = $request["nama_pekerjaan"];
        $pekerjaan->besaran_gaji = $request["besaran_gaji"];
        $pekerjaan->nama_perusahaan = $request["nama_perusahaan"];
        $pekerjaan->durasi_lamaran = $request["durasi_lamaran"];
        $pekerjaan->gambar = $namaFileGambar;
        $pekerjaan->lokasi_id = $request["lokasi_id"];
        $pekerjaan->kategori_id = $request["kategori_id"];
        $pekerjaan->deskripsi = $request["deskripsi"];

        $pekerjaan->save();

        // Kasih notifikasi kalau proses tambah data berhasil
        notify()->success('Data Lowongan Pekerjaan Berhasil ditambahkan ke dalam sistem...');

        return redirect('/admin/job');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $namaWebsite = "JobFinder";
        $namaHalaman = "Tambah Lowongan Pekerjaan Baru";
        //ambil data pekerjaan berdasarkan id
        $pekerjaan = Pekerjaan::with(['lokasi', 'kategori'])->find($id);
        // dd($pekerjaan);

        //arahkan ke halaman dashboard/job/detail
        return view('Dashboard.Job.detail', ['pekerjaan' => $pekerjaan, 'namaHalaman' => $namaHalaman, 'namaWebsite' => $namaWebsite]);
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
