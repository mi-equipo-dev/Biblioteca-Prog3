<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function libros()
    {
        return $this->hasMany(Libro::class);// Relacion uno a muchos entre categorias y libros (una categoria puede tener muchos libros)
    }
}
