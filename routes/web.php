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

// Login Page (GET) - Redirect to welcome page for login
Route::get('/login', function () { 
    return redirect('/'); 
})->name('login.show');

Route::get('/register', function () { 
    return view('auth.register'); 
})->name('register');

Route::post('/register', function () { 
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    auth()->login($user);

    return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
})->name('register.store');

Route::get('/forgot-password', function () { return "Forgot Password Feature Coming Soon"; })->name('password.request');

// Protected Routes - Require Authentication
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        $mahasiswaCount = \App\Models\Mahasiswa::count();
        $prodiCount = \App\Models\Prodi::count();
        $mataKuliahCount = \App\Models\MataKuliah::count();
        $krsCount = \App\Models\Krs::count();
        
        return view('dashboard', compact('mahasiswaCount', 'prodiCount', 'mataKuliahCount', 'krsCount'));
    })->name('dashboard');

    // Resource Routes
    Route::resource('prodis', ProdiController::class);
    Route::resource('mata-kuliah', MataKuliahController::class);
    Route::resource('mahasiswas', MahasiswaController::class);
    Route::resource('krs', KrsController::class)->parameters(['krs' => 'krs']);

    // KRS Detail Routes
    Route::post('krs/{krs}/detail', [KrsController::class, 'storeDetail'])->name('krs-detail.store');
    Route::delete('krs-details/{krsDetail}', [KrsController::class, 'destroyDetail'])->name('krs-detail.destroy');
    Route::get('krs/{krs}/print', [KrsController::class, 'print'])->name('krs.print');
});
