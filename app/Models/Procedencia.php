<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_procedencia'); // Relacion uno a muchos entre procedencias y libros (una procedencia puede tener muchos libros)
    }
}
