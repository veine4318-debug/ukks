<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login1', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/ubah-password', [AdminController::class, 'showUpdatePassword'])->name('password.edit');
    Route::post('/ubah-password', [AdminController::class, 'updatePassword'])->name('password.update');
    Route::post('/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/tambah', [AdminController::class, 'tambah']);
    Route::post('/tambahh', [AdminController::class, 'tambahh']);
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('website.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('website.update');
    Route::post('/publish/{id}', [AdminController::class, 'publish'])->name('website.publish');
    Route::get('/model', function () {
        return view('templates.model');
    });
    Route::get('/temp/{id}', [AdminController::class, 'template']);
});

Route::get('/{slug}', [AdminController::class, 'publicPortfolio'])
    ->where('slug', '[A-Za-z0-9\-]+')
    ->name('public.portfolio');

