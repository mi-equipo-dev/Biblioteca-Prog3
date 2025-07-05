<?php

use App\Models\Rol;//importamos la clase del namespace
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles', function () {
    $roles = Rol::all(); // Trae todos los roles de la base de datos
    return $roles;
});