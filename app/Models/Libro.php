<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'ISBN',
        'titulo',
        'autor',
        'editorial',
        'anio_publicacion',
        'cantidad',
        'id_categoria',
        'id_procedencia',
        'id_destino',
    ]; // Atributos que se pueden asignar masivamente
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');// Relacion uno a muchos entre categorias y libros (una categoria puede tener muchos libros)
    }

    public function procedencia()
    {
        return $this->belongsTo(Procedencia::class, 'id_procedencia'); // Relacion uno a muchos entre procedencias y libros (una procedencia puede tener muchos libros)
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'id_destino'); // Relacion uno a muchos entre destinos y libros (un destino puede tener muchos libros)
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_libro'); // Relacion uno a muchos entre prestamos y libros (un libro puede tener muchos prestamos)
    }
}
