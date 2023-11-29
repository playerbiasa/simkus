<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SemproController;
use App\Models\Sempro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/example-admin-page', 'example-admin-pages');
Route::view('/example-admin-auth', 'example-admin-auth');
Route::view('/', 'index');
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::middleware(['guest:mahasiswa', 'preventbackhistory'])->group(function () {
        Route::view('/', 'back.layout.user.user-layout')->name('login');
        Route::post('/login', [AuthController::class,'login'])->name('layanan-login-handler');
    });

    Route::middleware(['auth:mahasiswa', 'preventbackhistory'])->group(function () {
        Route::post('/logout', [AuthController::class,'logoutUser'])->name('layanan-logout-handler');
        Route::get('/dashboard', [LayananController::class,'index'])->name('layanan.dashboard');

        // ROUTE SEMPRO
        Route::get('/sempro', [LayananController::class, 'daftarSempro'])->name('sempro.daftar');
        Route::post('/sempro/store', [SemproController::class, 'store'])->name(('sempro.store'));

        // ROUTE JADWAL
        Route::get('/jadwal', [LayananController::class, 'jadwalSempro'])->name('sempro.jadwal');
    });

});
