<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);// Relacion uno a muchos entre categorias y libros (una categoria puede tener muchos libros)
    }

    public function procedencia()
    {
        return $this->belongsTo(Procedencia::class); // Relacion uno a muchos entre procedencias y libros (una procedencia puede tener muchos libros)
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class); // Relacion uno a muchos entre destinos y libros (un destino puede tener muchos libros)
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class); // Relacion uno a muchos entre prestamos y libros (un libro puede tener muchos prestamos)
    }
}
