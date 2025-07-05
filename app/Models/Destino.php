<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    public function libros()
    {
        return $this->hasMany(Libro::class); // Relacion uno a muchos entre destinos y libros (un destino puede tener muchos libros)
    }
}
