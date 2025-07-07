<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'fecha_prestamo',
        'fecha_devolucion',
        'id_libro',
        'id_usuario',
    ];
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro'); // Relacion uno a muchos entre prestamos y libros (un libro puede tener muchos prestamos)
    }
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario'); // Relacion uno a muchos entre prestamos y usuarios (un usuario puede tener muchos prestamos)
    }
}
