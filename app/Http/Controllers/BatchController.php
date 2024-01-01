<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::with('kegiatan')->get();
        return view('back.pages.admin.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatans = Kegiatan::all();
        return view('back.pages.admin.batch.create', compact('kegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validBacth = $request->validate([
            'nama' => 'required',
            'kegiatan_id' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'tahun' => 'required'
        ]);

        Batch::create($validBacth);

        return redirect()->route('admin.batch.index')
        ->with('success','Batch berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch = Batch::findOrFail($id);
        $kegiatans = Kegiatan::all();
        return view('back.pages.admin.batch.edit', compact('batch','kegiatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validBatch = $request->validate([
            'nama' => 'required',
            'kegiatan_id' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'tahun' => 'required'
        ]);

        $batch = Batch::findOrFail($id);
        $batch->update($validBatch);
        return redirect()->route('admin.batch.index')
        ->with('success','Batch berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return redirect()->route('admin.batch.index')
        ->with('success','Batch berhasil dihapus');
    }
}
