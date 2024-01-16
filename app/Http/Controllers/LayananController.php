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
        $sempros = Sempro::with('mahasiswa')->get();
        return view('front.dosen.sempro', compact('sempros'));
    }

    public function dosenSkripsi(){
        return view('front.dosen.skripsi');
    }

    public function setDosenPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        return view('front.dosen.set-penguji', compact('sempros'));
    }

    public function addDosenPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $dosens = Dosen::orderBy('nama', 'asc')->get();
        return view('front.dosen.add-penguji', compact('sempros','dosens'));
    }

    public function saveDosenPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $sempros->dosen()->attach(request('dosen_id'));
        return redirect()->route('dosen.sempro.penguji', $id)
        ->with('success','Dosen penguji berhasil di tambahkan');
    }

}
