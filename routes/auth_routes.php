<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Login
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::get("/login", [AuthController::class, 'LoginForm' ])->name("login");

// Ejemplo de Ruta protegida
// Route::middleware('auth')->get('/usuario', function (Request $request) {
//     return 'Usuario autenticado: ' . Auth::user()->nombre;
// });