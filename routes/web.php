<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return view('welcome');
});

// Simulate Login - Redirect to Dashboard
Route::post('/login', function () { 
    $user = \App\Models\User::where('email', 'admin@kampus.ac.id')->first();
    if ($user) {
        auth()->login($user);
    }
    return redirect()->route('dashboard'); 
})->name('login');

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Login Page (GET) - Optional if they visit /login directly
Route::get('/login', function () { 
    return redirect()->route('dashboard'); // Or show a view if implementing real auth later
});

Route::get('/register', function () { return redirect()->route('dashboard'); })->name('register');
Route::get('/forgot-password', function () { return "Forgot Password Feature Coming Soon"; })->name('password.request');

// Dashboard Route
Route::get('/dashboard', function () {
    $mahasiswaCount = \App\Models\Mahasiswa::count();
    $prodiCount = \App\Models\Prodi::count();
    $mataKuliahCount = \App\Models\MataKuliah::count();
    $krsCount = \App\Models\Krs::count();
    
    // Optional: Fetch recent activities or other data
    
    return view('dashboard', compact('mahasiswaCount', 'prodiCount', 'mataKuliahCount', 'krsCount'));
})->name('dashboard');

Route::resource('prodis', ProdiController::class);
Route::resource('mata-kuliah', MataKuliahController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('krs', KrsController::class)->parameters(['krs' => 'krs']);

Route::post('krs/{krs}/detail', [KrsController::class, 'storeDetail'])->name('krs-detail.store');
Route::delete('krs-details/{krsDetail}', [KrsController::class, 'destroyDetail'])->name('krs-detail.destroy');
Route::get('krs/{krs}/print', [KrsController::class, 'print'])->name('krs.print');
