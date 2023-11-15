<?php

use Illuminate\Support\Facades\Route;

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
    Route::view('/', 'back.layout.user.user-layout')->name('login');
    Route::view('/dashboard', 'front.index');
    Route::view('/sempro', 'front.sempro.index');

});
