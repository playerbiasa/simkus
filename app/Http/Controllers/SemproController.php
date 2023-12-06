<?php

namespace App\Http\Controllers;

use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class SemproController extends Controller
{
    public function index(){
        $sempros = Sempro::all();
        $mhss = Mahasiswa::all();

        return view('back.pages.admin.sempro.index', compact('mhss','sempros'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'mahasiswa_id'      => 'required',
            'judul_skripsi'     => 'required'
        ]);

        $daftarSempro = new Sempro();
        $daftarSempro->mahasiswa_id = $request->mahasiswa_id;
        $daftarSempro->judul_skripsi = $request->judul_skripsi;
        $daftarSempro->save();

        return redirect($request->redirect_to)
        ->with('success','Data pendaftaran akan di verifikasi terlebih dahulu');
    }
}
