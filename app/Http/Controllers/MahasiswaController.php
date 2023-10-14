<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        return view('back.pages.admin.mahasiswa.index');
    }

    public function create(){
        $prodis = Prodi::all();
        return view('back.pages.admin.mahasiswa.create',compact('prodis'));
    }

    public function store(Request $request){
        $valid = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
            'phone' => 'required|max:15',
        ]);

        dd($valid);
    }
}
