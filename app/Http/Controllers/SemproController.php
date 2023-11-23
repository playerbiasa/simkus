<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Sempro;
use Illuminate\Http\Request;

class SemproController extends Controller
{
    public function daftar(){
        $mhs = Mahasiswa::all();
        $prodis = Prodi::get();

        return view('front.sempro.daftar-sempro', compact('mhs','prodis'));
    }

    public function store(Request $request){
        $validateData   = $request->validate([
            'mahasiswa_id'      => 'required',
            'judul_skripsi'     => 'required'
        ]);

        Sempro::create($validateData);
        return redirect()->route('layanan.layanan.dashboard')
        ->with('success','Terimakasih telah melakukan pendaftaran sempro, data pendaftaran akan di verifikasi terlebih dahulu');
    }
}
