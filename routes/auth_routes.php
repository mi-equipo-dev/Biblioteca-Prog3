<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Login
Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'Login'])->name('login');
    Route::get("/login", [AuthController::class, 'LoginForm' ])->name("loginForm");
});

// Logout
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
});

// Ejemplo de Ruta protegida
// Route::middleware('auth')->get('/usuario', function (Request $request) {
//     return 'Usuario autenticado: ' . Auth::user()->nombre;
// });