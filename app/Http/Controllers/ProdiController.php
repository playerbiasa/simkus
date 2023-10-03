<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(Request $request){

        $prodis = Prodi::all();
        return view('back.pages.admin.prodi.prodi',compact('prodis'));
    }
}
