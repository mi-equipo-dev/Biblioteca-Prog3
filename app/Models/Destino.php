<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $fillable = ['destino'];
    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_destino'); // Relacion uno a muchos entre destinos y libros (un destino puede tener muchos libros)
    }
}
