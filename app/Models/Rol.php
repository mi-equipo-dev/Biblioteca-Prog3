<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['rol'];
   public function usuarios()
   {
       return $this->hasMany(Usuario::class,"id_rol");// Relacion uno a muchos entre roles y usuarios(un rol puede tener muchos usuarios)
   }
}
