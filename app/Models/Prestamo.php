<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public function libro()
    {
        return $this->belongsTo(Libro::class); // Relacion uno a muchos entre prestamos y libros (un libro puede tener muchos prestamos)
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class); // Relacion uno a muchos entre prestamos y usuarios (un usuario puede tener muchos prestamos)
    }
}
