<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('prodis', ProdiController::class);
Route::resource('mata-kuliah', MataKuliahController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('krs', KrsController::class);

Route::post('krs/{krs}/detail', [KrsController::class, 'storeDetail'])->name('krs-detail.store');
Route::delete('krs-details/{krsDetail}', [KrsController::class, 'destroyDetail'])->name('krs-detail.destroy');
Route::get('krs/{krs}/print', [KrsController::class, 'print'])->name('krs.print');
