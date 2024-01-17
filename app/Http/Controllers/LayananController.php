<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    private $ruang    = ["2.06", "2.09", "2.10", "3.06", "3.07", "3.10"];

    public function index(){
        $sempros = Sempro::all();
        $mhss = Mahasiswa::all();
        $prodis = Prodi::all();

        return view('front.index', compact('sempros','mhss','prodis'));
    }

    public function daftarSempro(){
        $mhs = Mahasiswa::all();
        $mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
        $prodis = Prodi::get();
        $daftars = Sempro::where('mahasiswa_id', $mahasiswa_id)->count();
        // $daftars = Sempro::where('created_at', $tanggaldaftar)->where('mahasiswa_id', $mhsid)->count();

        return view('front.sempro.daftar-sempro', compact('mhs','prodis','daftars'));
    }

    public function jadwalSempro(){
        return view('front.jadwal.jadwal');
    }

    public function dosenDashboard(){
        $sempros = Sempro::with('mahasiswa')->get();
        return view('front.dosen-home', compact('sempros'));
    }

    public function dosenSempro(){
        $kaprodi = Auth::user();
        $prodi = $kaprodi->prodi;
        $sempros = Sempro::whereHas('mahasiswa', function ($query) use ($prodi) {
            $query->where('prodi_id', $prodi->id);
        })->get();

        return view('front.dosen.sempro', compact('sempros'));
    }

    public function dosenSkripsi(){
        return view('front.dosen.skripsi');
    }

    public function setDosenPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $ruang = $this->ruang;
        return view('front.dosen.set-penguji', compact('sempros','ruang'));
    }

    public function addDosenPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $dosens = Dosen::orderBy('nama', 'asc')->get();
        return view('front.dosen.add-penguji', compact('sempros','dosens'));
    }

    public function saveDosenPenguji(Request $request, string $id){
        $validSempro = $request->validate([
            'dosen_id'      => 'required',
            'sebagai'      => 'required',
            'ke'           => 'required',
        ]);

        $sempros = Sempro::findOrFail($id);
        $sempros->dosen()->attach($validSempro['dosen_id'],
        ['sebagai' => $validSempro['sebagai'], 'ke' => $validSempro['ke']]);

        return redirect()->route('dosen.sempro.penguji', $id)
        ->with('success','Dosen penguji berhasil di tambahkan');
    }

    public function saveJadwal(Request $request, string $id){
        $sempros = Sempro::findOrFail($id);
        $validSempro = $request->validate([
            'tanggal_sempro'    => 'required',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
            'ruang'             => 'required',
        ]);
        $validSempro['status'] = 5;
        $sempros->update($validSempro);
        return redirect()->route('dosen.sempro.penguji', $id)
        ->with('success','Jadwal mahasiswa berhasil');
    }

    public function destroyPenguji(string $id, Request $request){
        $sempros = Sempro::findOrFail($id);
        $sempros->dosen()->detach($request->dosen_id);
        return redirect()->route('dosen.sempro.penguji', $id)
        ->with('success','Dosen penguji berhasil di hapus');
    }

}
