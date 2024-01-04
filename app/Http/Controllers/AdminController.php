<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Sempro;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $mhss = Mahasiswa::all();
        $sempros = Sempro::all();
        $skripsis = Skripsi::all();
        return view('back.pages.admin.home', compact('mhss','sempros','skripsis'));
    }

    public function loginHandler(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required:min:6|max:15'
            ],[
                'login_id.required' => 'Email/Username wajib diisi',
                'login_id.email' => 'Email salah',
                'login_id.exists' => 'Email tidak terdaftar di sistem',
                'password.required' => 'Password wajib diisi'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required:min:6|max:15'
            ],[
                'login_id.required' => 'Email/Username wajib diisi',
                'login_id.exists' => 'Username tidak terdaftar di sistem',
                'password.required' => 'Password wajib diisi'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if(Auth::guard('admin')->attempt($creds)){
            $checkUser = Admin::where($fieldType, $request->login_id)->first();
            if($checkUser->status == 0){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('fail','Akun anda tidak aktif!');
            }else{
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
        }else{
            session()->flash('fail','Incorrect credentials');
            return redirect()->route('admin.login');
        }
    }

    public function logoutHandler(Request $request){
        Auth::guard('admin')->logout();
        session()->flash('fail','Anda sudah logout!');
        return redirect()->route('admin.login');
    }
}
