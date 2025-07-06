<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = ['nombre', 'apellido', 'CUIL', 'domicilio', 'telefono', 'email', 'contrasenia', 'id_rol'];
    protected $hidden = ['contrasenia']; // Oculta en JSON
    protected $appends = [
        "es_bibliotecario",
        "es_administrador"
    ];
     // Atributo virtual: $usuario->es_bibliotecario
    public function getEsBibliotecarioAttribute()
    {
        return $this->rol && strtolower($this->rol->rol) === 'bibliotecario';
    }
    public function getEsAdministradorAttribute()
    {
        return $this->rol && strtolower($this->rol->rol) === 'administrador';
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class,"id_rol");// Relacion uno a uno entre usuarios y roles (un usuario tiene un rol)
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_usuario'); // Relacion uno a muchos entre prestamos y usuarios (un usuario puede tener muchos prestamos)
    }

    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['contrasenia'] = bcrypt($value);
    }
}
