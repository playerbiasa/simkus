<?php

namespace App\Http\Controllers;

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
}
