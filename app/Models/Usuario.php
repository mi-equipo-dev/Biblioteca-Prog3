<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $appends = [
        "es_bibliotecario"
    ];
     // Atributo virtual: $usuario->es_bibliotecario
    public function getEsBibliotecarioAttribute()
    {
        return $this->rol && strtolower($this->rol->rol) === 'bibliotecario';
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class,"id_rol");// Relacion uno a uno entre usuarios y roles (un usuario tiene un rol)
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_usuario'); // Relacion uno a muchos entre prestamos y usuarios (un usuario puede tener muchos prestamos)
    }
}
