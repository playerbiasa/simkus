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
        Route::prefix('prodi')->group(function () {
            Route::get('/', [ProdiController::class, 'index'])->name('prodi.index');
            Route::post('/add-prodi', [ProdiController::class, 'addProdi'])->name('prodi.add.prodi');
            Route::get('/getProdiList', [ProdiController::class, 'getProdiList'])->name('prodi.getprodi.list');
            Route::post('/getProdiDetails', [ProdiController::class, 'getProdiDetails'])->name('prodi.getprodi.details');
            Route::post('/updateProdi', [ProdiController::class, 'updateProdiDetails'])->name('prodi.update.details');
            Route::post('/deleteProdi', [ProdiController::class, 'deleteProdi'])->name('prodi.delete');
        });

        //ROUTE DOSEN
        Route::prefix('dosen')->group(function () {
            Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
            Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
            Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
            Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
            Route::put('/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
            Route::delete('/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.delete');
            Route::post('/import', [DosenController::class, 'import'])->name('dosen.import');
        });

        //ROUTE MAHASISWA
        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', [MahasiswaController::class, 'index'])->name('mhs.index');
            Route::post('/', [MahasiswaController::class, 'store'])->name('mhs.store');
            Route::get('/create', [MahasiswaController::class, 'create'])->name('mhs.create');
            Route::post('/import', [MahasiswaController::class, 'import'])->name('mhs.import');
        });

        //ROUTE SEMPRO
        Route::prefix('sempro')->group(function () {
            Route::get('/', [SemproController::class, 'index'])->name('sempro.index');
            Route::post('/', [SemproController::class, 'store'])->name(('sempro.store'));
            Route::get('/edit/{id}', [SemproController::class, 'edit'])->name('sempro.edit');
            Route::put('/update/{id}', [SemproController::class, 'update'])->name('sempro.update');
            Route::delete('/delete/{id}', [SemproController::class, 'destroy'])->name('sempro.delete');
            Route::get('/status/{id}', [SemproController::class, 'status'])->name('sempro.status');
            Route::put('/status/{id}', [SemproController::class, 'updateStatus'])->name('sempro.status.update');
            Route::get('/penguji/{id}', [SemproController::class, 'penguji'])->name('sempro.penguji');
            Route::get('/penguji/{id}/add', [SemproController::class, 'addPenguji'])->name('sempro.penguji.add');
            Route::post('/penguji/{id}', [SemproController::class, 'storePenguji'])->name('sempro.penguji.store');
            Route::put('/penguji/{id}', [SemproController::class, 'updatePenguji'])->name('sempro.penguji.update');
            Route::delete('/penguji/{id}', [SemproController::class, 'destroyPenguji'])->name('sempro.penguji.delete');
        });

        //ROUTE KEGIATAN
        Route::prefix('kegiatan')->group(function () {
            Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
            Route::post('/', [KegiatanController::class, 'store'])->name('kegiatan.store');
            Route::get('/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
            Route::get('/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
            Route::put('/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
            Route::delete('/delete/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');
        });


        //ROUTE BATCH
        Route::prefix('batch')->group(function () {
            Route::get('/', [BatchController::class, 'index'])->name('batch.index');
            Route::post('/', [BatchController::class, 'store'])->name('batch.store');
            Route::get('/create', [BatchController::class, 'create'])->name('batch.create');
            Route::get('/edit/{id}', [BatchController::class, 'edit'])->name('batch.edit');
            Route::put('/update/{id}', [BatchController::class, 'update'])->name('batch.update');
            Route::delete('/delete/{id}', [BatchController::class, 'destroy'])->name('batch.delete');
        });
    });
});
