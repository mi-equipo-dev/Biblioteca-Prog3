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
