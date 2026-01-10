<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return view('welcome');
});

// Placeholder Auth Routes to prevent Landing Page crash
Route::get('/login', function () { return "Login Feature Coming Soon"; })->name('login');
Route::post('/login', function () { return "Login Process Coming Soon"; });
Route::get('/register', function () { return "Register Feature Coming Soon"; })->name('register');
Route::get('/forgot-password', function () { return "Forgot Password Feature Coming Soon"; })->name('password.request');

Route::resource('prodis', ProdiController::class);
Route::resource('mata-kuliah', MataKuliahController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('krs', KrsController::class);

Route::post('krs/{krs}/detail', [KrsController::class, 'storeDetail'])->name('krs-detail.store');
Route::delete('krs-details/{krsDetail}', [KrsController::class, 'destroyDetail'])->name('krs-detail.destroy');
Route::get('krs/{krs}/print', [KrsController::class, 'print'])->name('krs.print');
