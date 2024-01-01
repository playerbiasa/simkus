<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('back.pages.admin.kegiatan.index',compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validKeg = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Kegiatan::create($validKeg);

        return redirect()->route('admin.kegiatan.index')
        ->with('success','Kegiatan berhasil ditambahkan');
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
        $kegiatan = Kegiatan::findOrFail($id);
        return view('back.pages.admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validKeg = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($validKeg);

        return redirect()->route('admin.kegiatan.index')
        ->with('success','Kegiatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index')
        ->with('success','Kegiatan berhasil dihapus');
    }
}
