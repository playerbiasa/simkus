<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        return view('back.pages.admin.mahasiswa.index');
    }

    public function create(){
        return view('back.pages.admin.mahasiswa.create');
    }
}
