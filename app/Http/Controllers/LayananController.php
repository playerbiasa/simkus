<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

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
        $prodis = Prodi::get();
        $daftars = Sempro::where('status_daftar','=', 1)->get();

        return view('front.sempro.daftar-sempro', compact('mhs','prodis','daftars'));
    }

    public function jadwalSempro(){
        return view('front.jadwal.jadwal');
    }
}
