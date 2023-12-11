<?php

namespace App\Http\Controllers;

use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class SemproController extends Controller
{
    public function index(){
        $sempros = Sempro::with('mahasiswa')->get();

        return view('back.pages.admin.sempro.index', compact('sempros'));
    }

    public function store(Request $request){
        $validSempro = $request->validate([
            'mahasiswa_id'      => 'required',
            'judul_skripsi'     => 'required'
        ]);

        Sempro::create($validSempro);

        return redirect($request->redirect_to)
        ->with('success','Data pendaftaran akan di verifikasi terlebih dahulu');
    }
}
