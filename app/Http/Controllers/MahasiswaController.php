<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
        $validMhs = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
        ]);

        $validMhs['password'] = Hash::make($request->input('nim'));

        Mahasiswa::create($validMhs);

        return redirect()->route('admin.mhs.index')
        ->with('success','Data mahasiswa berhasil ditambahkan');
    }

    public function import(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new MahasiswaImport, $file);
        return redirect()->route('admin.mhs.index')
        ->with('success','Berhasil import data');
    }
}
