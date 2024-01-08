<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class SemproController extends Controller
{
    public function index(){
        $sempros = Sempro::with('mahasiswa')->get();
        $batches = Batch::with('kegiatan')->get();

        return view('back.pages.admin.sempro.index', compact('sempros','batches'));
    }

    public function store(Request $request){
        $validSempro = $request->validate([
            'mahasiswa_id'      => 'required',
            'judul_skripsi'     => 'required',
            'batch_id'      => 'required',
        ]);

        Sempro::create($validSempro);

        return redirect($request->redirect_to)
        ->with('success','Data pendaftaran akan di verifikasi terlebih dahulu');
    }

    public function edit(string $id)
    {
        $sempros = Sempro::findOrFail($id);
        return view('back.pages.admin.sempro.edit', compact('sempros'));
    }

    public function update(Request $request, string $id){
        $valid = $request->validate([
            'judul_skripsi' => 'required',
        ]);

        $sempro = Sempro::findOrFail($id);
        $sempro->update($valid);
        return redirect()->route('admin.sempro.index')
        ->with('success','Data pendaftaran berhasil diubah');
    }

    public function destroy(string $id){
        $sempros = Sempro::findOrFail($id);
        $sempros->delete();
        return redirect()->route('admin.sempro.index')
        ->with('success','Data pendaftaran berhasil di hapus');
    }

    public function status(string $id){
        $sempros = Sempro::findOrFail($id);
        return view('back.pages.admin.sempro.ubah-status', compact('sempros'));
    }

    public function updateStatus(Request $request, string $id){
        $validSempro = $request->validate([
            'status' => 'required',
        ]);

        $sempros = Sempro::findOrFail($id);
        $sempros->update($validSempro);

        return redirect()->route('admin.sempro.index')
        ->with('success','Status pendaftaran berhasil diubah');

    }

    public function addPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        return view('back.pages.admin.sempro.addpenguji', compact('sempros'));
    }
}
