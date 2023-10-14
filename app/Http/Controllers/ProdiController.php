<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Prodi::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('back.pages.admin.prodi.prodi');
    }


    public function store(Request $request)
    {
        Prodi::updateOrCreate([
                    'id' => $request->prodi_id
                ],
                [
                    'nama' => $request->nama,
                    'singkatan' => $request->singkatan,
                    'jenjang' => $request->jenjang
                ]);

        return response()->json(['success'=>'Record saved successfully.']);
    }

    public function edit($id)
    {
        $product = Prodi::find($id);
        return response()->json($product);
    }


    public function destroy($id)
    {
        Prodi::find($id)->delete();

        return response()->json(['success'=>'Record deleted successfully.']);
    }
}

