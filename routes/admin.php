<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','preventbackhistory'])->group(function(){
        Route::view('/login', 'back.layout.admin.auth-layout')->name('login');
        Route::post('/login-handler',[AdminController::class,'loginHandler'])->name('login-handler');
    });

    Route::middleware(['auth:admin','preventbackhistory'])->group(function(){
        Route::get('/home',[AdminController::class,'dashboard'])->name('home');
        Route::post('/logout-handler',[AdminController::class,'logoutHandler'])->name('logout-handler');

        //ROUTE PRODI
        Route::resource('prodi', ProdiController::class);

        //ROUTE DOSEN
        Route::get('/dosen',[DosenController::class, 'index'])->name('dosen.index');
        Route::get('/pimpinan',[DosenController::class, 'pimpinan'])->name('dosen.pimpinan');

        //ROUTE MAHASISWA
        Route::get('/mahasiswa',[MahasiswaController::class, 'index'])->name('mhs.index');
        Route::get('/mahasiswa/create',[MahasiswaController::class, 'create'])->name('mhs.create');
        Route::post('/mahasiswa/store',[MahasiswaController::class, 'store'])->name('mhs.store');
    });
});


