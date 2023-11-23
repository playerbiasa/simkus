<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $request->validate([
                'login_id' => 'required',
                'password' => 'required:min:6|max:15'
            ],[
                'login_id.required' => 'Email/Username wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required',
                'password' => 'required:min:6|max:15'
            ],[
                'login_id.required' => 'Email/Username wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if(Auth::guard('mahasiswa')->attempt($creds)){
            $checkUser = Mahasiswa::where($fieldType, $request->login_id)->first();
            if($checkUser->status == 0){
                Auth::guard('mahasiswa')->logout();
                return redirect()->route('layanan.login')->with('fail','Akun anda tidak aktif!');
            }else{
                $request->session()->regenerate();
                return redirect()->route('layanan.layanan.dashboard');
            }
        }else{
            session()->flash('fail','Email/Username atau Password salah!!!');
            return redirect()->route('layanan.login');
        }
    }

    public function logoutUser(Request $request){
        Auth::guard('mahasiswa')->logout();
        session()->flash('fail','Anda sudah logout!');
        return redirect()->route('layanan.login');
    }
}
