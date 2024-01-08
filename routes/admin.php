<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SemproController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'preventbackhistory'])->group(function () {
        Route::view('/', 'back.layout.admin.auth-layout')->name('login');
        Route::post('login-handler', [AdminController::class, 'loginHandler'])->name('login-handler');
    });

    Route::middleware(['auth:admin', 'preventbackhistory'])->group(function () {
        Route::get('home', [AdminController::class, 'dashboard'])->name('home');
        Route::post('logout-handler', [AdminController::class, 'logoutHandler'])->name('logout-handler');

        //ROUTE PRODI
        Route::get('prodi', [ProdiController::class, 'index'])->name('prodi.index');
        Route::post('prodi/add-prodi', [ProdiController::class, 'addProdi'])->name('prodi.add.prodi');
        Route::get('prodi/getProdiList', [ProdiController::class, 'getProdiList'])->name('prodi.getprodi.list');
        Route::post('prodi/getProdiDetails', [ProdiController::class, 'getProdiDetails'])->name('prodi.getprodi.details');
        Route::post('prodi/updateProdi', [ProdiController::class, 'updateProdiDetails'])->name('prodi.update.details');
        Route::post('prodi/deleteProdi', [ProdiController::class, 'deleteProdi'])->name('prodi.delete');

        //ROUTE DOSEN
        Route::prefix('dosen')->group(function () {
            Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
            Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
            Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
            Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
            Route::put('/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
            Route::delete('/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.delete');
        });

        //ROUTE MAHASISWA
        Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mhs.index');
        Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mhs.create');
        Route::post('mahasiswa/store', [MahasiswaController::class, 'store'])->name('mhs.store');
        Route::post('mahasiswa/import', [MahasiswaController::class, 'import'])->name('mhs.import');

        //ROUTE SEMPRO
        Route::prefix('sempro')->group(function () {
            Route::get('/', [SemproController::class, 'index'])->name('sempro.index');
            Route::post('/', [SemproController::class, 'store'])->name(('sempro.store'));
            Route::get('/edit/{id}', [SemproController::class, 'edit'])->name('sempro.edit');
            Route::put('/update/{id}', [SemproController::class, 'update'])->name('sempro.update');
            Route::delete('/delete/{id}', [SemproController::class, 'destroy'])->name('sempro.delete');
            Route::get('/status/{id}', [SemproController::class, 'status'])->name('sempro.status');
            Route::put('/status/{id}', [SemproController::class, 'updateStatus'])->name('sempro.status.update');
            Route::get('/addpenguji/{id}', [SemproController::class, 'addPenguji'])->name('sempro.addpenguji');
        });

        //ROUTE KEGIATAN
        Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::get('kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
        Route::post('kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
        Route::put('kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
        Route::delete('kegiatan/delete/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');

        //ROUTE BATCH
        Route::get('batch', [BatchController::class, 'index'])->name('batch.index');
        Route::get('batch/create', [BatchController::class, 'create'])->name('batch.create');
        Route::post('batch', [BatchController::class, 'store'])->name('batch.store');
        Route::get('batch/edit/{id}', [BatchController::class, 'edit'])->name('batch.edit');
        Route::put('batch/update/{id}', [BatchController::class, 'update'])->name('batch.update');
        Route::delete('batch/delete/{id}', [BatchController::class, 'destroy'])->name('batch.delete');
    });
});
