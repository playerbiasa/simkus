<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;

Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::middleware(['guest:dosen', 'preventbackhistory'])->group(function () {
        Route::view('/', 'back.layout.dosen.dosen-layout')->name('login');
        Route::post('/login', [AuthController::class,'dosenlogin'])->name('login-handler');
    });

    Route::middleware(['auth:dosen', 'preventbackhistory'])->group(function () {
        Route::post('/logout', [AuthController::class,'logoutDosen'])->name('logout-handler');
        Route::get('/dashboard', [LayananController::class,'dosenDashboard'])->name('dashboard');
        Route::get('/sempro', [LayananController::class,'dosenSempro'])->name('sempro');
        Route::get('/sempro/penguji/{id}', [LayananController::class,'setDosenPenguji'])->name('sempro.penguji');
        Route::get('/sempro/penguji/{id}/add', [LayananController::class,'addDosenPenguji'])->name('sempro.penguji.add');
        Route::post('/sempro/penguji/{id}', [LayananController::class,'saveDosenPenguji'])->name('sempro.penguji.save');
        Route::put('/sempro/penguji/{id}', [LayananController::class,'saveJadwal'])->name('sempro.jadwal');
        Route::delete('/sempro/penguji/{id}', [LayananController::class,'destroyPenguji'])->name('sempro.penguji.delete');
        Route::get('/skripsi', [LayananController::class,'dosenSkripsi'])->name('skripsi');
    });
});
