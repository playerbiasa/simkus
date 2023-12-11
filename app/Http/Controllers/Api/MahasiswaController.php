<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use DataTables;

class MahasiswaController extends Controller
{
    // get mahasiswa data
    public function getDataMhsAll()
    {
        $mhs = Mahasiswa::with('prodi')->orderBy('nim', 'asc');
        return DataTables::of($mhs)
            ->addIndexColumn()
            ->editColumn('prodi.nama', function($row){
                return $row->prodi->nama;
            })
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                    <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editProdiBtn">
                    <i class="far fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteProdiBtn">
                    <i class="fas fa-times"></i></button>
                </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
