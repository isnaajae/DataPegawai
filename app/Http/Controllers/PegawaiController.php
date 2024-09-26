<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{
    // Menampilkan semua data pegawai
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    
    // Menampilkan form untuk menambah pegawai baru
    public function create()
    {
        return view('pegawai.create');
    }

    // Menyimpan data pegawai ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|integer',
            'bidang' => 'required',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }
    public function dashboard()
{
    $totalPegawai = Pegawai::count();
    $bidangPegawai = Pegawai::select('bidang', DB::raw('count(*) as total'))
                            ->groupBy('bidang')
                            ->get();
    
    $latestPegawai = Pegawai::latest()->take(5)->get(); // Ambil 5 pegawai terbaru

    return view('dashboard', compact('totalPegawai', 'bidangPegawai', 'latestPegawai'));
}


    // Menampilkan detail pegawai
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    // Menampilkan form edit pegawai
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    // Update data pegawai di database
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|integer',
            'bidang' => 'required',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    // Menghapus data pegawai dari database
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
