<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Dosen;
use App\Models\Sempro;
use Illuminate\Http\Request;

class SemproController extends Controller
{
    private $ruang    = ["2.06", "2.09", "2.10", "3.06", "3.07", "3.10"];

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

    public function penguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $ruang = $this->ruang;
        return view('back.pages.admin.sempro.penguji', compact('sempros', 'ruang'));
    }

    public function addPenguji(string $id){
        $sempros = Sempro::findOrFail($id);
        $dosens = Dosen::orderBy('nama', 'asc')->get();
        return view('back.pages.admin.sempro.addpenguji', compact('sempros','dosens'));
    }

    public function storePenguji(Request $request, string $id){
        $validSempro = $request->validate([
            'dosen_id'      => 'required',
            'sebagai'      => 'required',
            'ke'           => 'required',
        ]);

        $sempros = Sempro::findOrFail($id);
        $sempros->dosen()->attach($validSempro['dosen_id'],
        ['sebagai' => $validSempro['sebagai'], 'ke' => $validSempro['ke']]);

        return redirect()->route('admin.sempro.penguji', $id)
        ->with('success','Dosen penguji berhasil ditambahkan');
    }

    public function updatePenguji(Request $request, string $id){
        $sempros = Sempro::findOrFail($id);
        $validSempro = $request->validate([
            'tanggal_sempro'    => 'required',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
            'ruang'             => 'required',
        ]);
        $validSempro['status'] = 5;
            $sempros->update($validSempro);
            return redirect()->route('admin.sempro.penguji', $id)
            ->with('success','Jadwal mahasiswa berhasil');
    }

    public function destroyPenguji(string $id, Request $request){
        $sempros = Sempro::findOrFail($id);
        $sempros->dosen()->detach($request->dosen_id);
        return redirect()->route('admin.sempro.penguji', $id)
        ->with('success','Dosen penguji berhasil di hapus');
    }
}
