<?php

use App\Http\Controllers\ProcedenciaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
include('auth_routes.php');

Route::get('/', function () {
    return view('presentacion.equipo');
})->name('welcome');

// Rutas para ROLES
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/crear', [RolController::class, 'create'])->name('roles.create');
Route::get("/roles/{id}",[RolController::class,'show'])->name('roles.show');
Route::get("/roles/{id}/editar",[RolController::class,'edit'])->name('roles.edit');
Route::put("/roles/{id}",[RolController::class,'update'])->name('roles.update');
Route::delete("/roles/{id}",[RolController::class,'delete'])->name('roles.delete');
Route::resource('usuarios', UsuarioController::class); //añadido front
Route::get('/bibliotecario/crear', function () {
    return view('usuarios.create');
});


// Rutas para CATEGORÍAS
Route::resource('categorias', CategoriaController::class);

//Rutas para PROCEDENCIAS
Route::resource('procedencias', ProcedenciaController::class);

// Rutas para DESTINOS
Route::resource('destinos', DestinoController::class);

// Rutas para LIBROS
Route::resource('libros', LibroController::class);

// Rutas para USUARIOS
Route::resource('usuarios', UsuarioController::class);

// Rutas para PRESTAMOS
Route::resource('prestamos', PrestamoController::class);

// Búsqueda por CUIL (extra)
Route::get('prestamos/buscar-cuil', [PrestamoController::class, 'buscarPorCuil'])->name('prestamos.buscarCuil');

Route::get('/equipo', function () {
    return view('presentacion.equipo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



