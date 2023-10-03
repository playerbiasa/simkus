<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        return view ('back.pages.admin.dosen.index');
    }

    public function pimpinan(){
        return view ('back.pages.admin.dosen.pimpinan');
    }
}
