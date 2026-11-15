<?php

use Illuminate\Support\Facades\Route;
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/process', [AdminController::class, 'process']);
Route::get('/', function () {
    return view('welcome');
});
