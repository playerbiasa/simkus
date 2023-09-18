<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'back.layout.admin.auth-layout')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home', 'back.pages.admin.home')->name('home');
    });
});
