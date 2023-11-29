<?php

namespace App\Http\Controllers;

use App\Models\Sempro;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SemproController extends Controller
{
    public function index(){
        return view('back.pages.admin.sempro.index');
    }

    // get prodi list
    public function getSemproList()
    {
        $sempros = Sempro::all();
        return DataTables::of($sempros)
            ->addIndexColumn()
            ->addColumn('actions', function () {
                return '<div class="btn-group">
                <a href="#" class="btn btn-icon btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="#" class="btn btn-icon btn-sm btn-success"><i class="far fa-edit"></i></a>
                <a href="#" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-times"></i></a>
                </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request){
        $this->validate($request,[
            'mahasiswa_id'      => 'required',
            'judul_skripsi'     => 'required'
        ]);

        $daftarSempro = new Sempro();
        $daftarSempro->mahasiswa_id = $request->mahasiswa_id;
        $daftarSempro->judul_skripsi = $request->judul_skripsi;
        $daftarSempro->status_daftar = 1;
        $daftarSempro->save();

        return redirect()->route('layanan.layanan.dashboard')
        ->with('success','Data pendaftaran akan di verifikasi terlebih dahulu');
    }
}
