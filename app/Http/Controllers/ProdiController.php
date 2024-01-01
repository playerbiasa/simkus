<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index()
    {
        return view('back.pages.admin.prodi.prodi');
    }

    //add new prodi
    public function addProdi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'singkatan' => 'required',
            'jenjang' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $prodi = new Prodi();
            $prodi->nama = $request->nama;
            $prodi->singkatan = $request->singkatan;
            $prodi->jenjang = $request->jenjang;
            $query = $prodi->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan input']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Data Prodi berhasil disimpan']);
            }
        }
    }

    // get prodi list
    public function getProdiList()
    {
        $prodis = Prodi::all();
        return DataTables::of($prodis)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                    <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editProdiBtn"><i class="far fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteProdiBtn"><i class="fas fa-times"></i></button>
                </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    // get prodi details
    public function getProdiDetails(Request $request)
    {
        $prodi_id = $request->prodi_id;
        $prodiDetails = Prodi::find($prodi_id);
        return response()->json(['details' => $prodiDetails]);
    }

    //update prodi detail
    public function updateProdiDetails(Request $request)
    {
        $prodi_id = $request->cid;

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'singkatan' => 'required',
            'jenjang' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $prodi = Prodi::find($prodi_id);
            $prodi->nama = $request->nama;
            $prodi->singkatan = $request->singkatan;
            $prodi->jenjang = $request->jenjang;
            $query = $prodi->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data Prodi berhasil diubah']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Data prodi gagal diubah']);
            }
        }
    }

    //delete prodi record
    public function deleteProdi(Request $request){
        $prodi_id = $request->prodi_id;

        // dd(Mahasiswa::where("prodi_id",$prodi_id)->count());

        if (Mahasiswa::where("prodi_id",$prodi_id)->count()>0) {
            return response()->json(['code'=>0,'msg'=>'Data Prodi gagal dihapus']);
        }else{
            Prodi::find($prodi_id)->delete();
            return response()->json(['code'=>1,'msg'=>'Data Prodi berhasil dihapus']);
        }
    }
}
