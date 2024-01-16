<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson()){
            if($request->routeIs('admin.*')){
                session()->flash('fail','Silahkan login sebgai admin');
                return route('admin.login');
            }

            if($request->routeIs('layanan.*')){
                session()->flash('fail','Silahkan login sebagai mahasiswa');
                return route('layanan.login');
            }

            if($request->routeIs('dosen.*')){
                session()->flash('fail','Silahkan login sebagai kaprodi');
                return route('dosen.login');
            }
        }
    }
}
