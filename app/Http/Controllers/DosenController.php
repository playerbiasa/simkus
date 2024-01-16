<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    public function index(){
        $dosens = Dosen::with('prodi')->orderBy('prodi_id', 'asc')->paginate(10);
        return view ('back.pages.admin.dosen.index', compact('dosens'));
    }

    public function create(){
        $prodis = Prodi::all();
        return view ('back.pages.admin.dosen.create', compact('prodis'));
    }

    public function store(Request $request){
        $validation = $request->validate([
            'niy' => 'required|unique:dosens',
            'nidn' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'prodi_id' => 'required',
        ]);

        $validation['password'] = Hash::make($request->input('niy'));

        Dosen::create($validation);
        return redirect()->route('admin.dosen.index')
        ->with('success', 'Data dosen baru berhasil ditambahkan');
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function import(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new DosenImport, $file);
        return redirect()->route('admin.dosen.index')
        ->with('success','Berhasil import data');
    }
}
