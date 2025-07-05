<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function rol()
    {
        return $this->belongsTo(Rol::class);// Relacion uno a uno entre usuarios y roles (un usuario tiene un rol)
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class); // Relacion uno a muchos entre prestamos y usuarios (un usuario puede tener muchos prestamos)
    }
}
