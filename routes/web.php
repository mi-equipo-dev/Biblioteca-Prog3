<?php

use App\Http\Controllers\RolController;
use App\Models\Rol;//importamos la clase del namespace
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/crear', [RolController::class, 'create'])->name('roles.create');
Route::get("/roles/{id}",[RolController::class,'show'])->name('roles.show');
Route::get("/roles/{id}/editar",[RolController::class,'edit'])->name('roles.edit');
Route::put("/roles/{id}",[RolController::class,'update'])->name('roles.update');
Route::delete("/roles/{id}",[RolController::class,'delete'])->name('roles.delete');
