<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Destino;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Procedencia;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Para Roles protected $fillable = ['rol'];
        //Creamos los roles necesarios
        Rol::create(['rol' => 'administrador']);
        Rol::create(['rol' => 'bibliotecario']);
        Rol::create(['rol' => 'usuario']);

        Usuario::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'CUIL' => '20-12345678-9',
            'domicilio' => 'Calle Falsa 123',
            'telefono' => '1234567890',
            'email' => 'admin@gmail.com',
            'contrasenia' => Hash::make('admin'),
            'id_rol' => 1 // Administrador
        ]);
        Usuario::create([
            'nombre' => 'Ana',
            'apellido' => 'Gómez',
            'CUIL' => '20-98765432-1',
            'domicilio' => 'Avenida Siempre Viva 456',
            'telefono' => '0987654321',
            'email' => 'bibliotecario@gmail.com',
            'contrasenia' => Hash::make('bibliotecario'),
            'id_rol' => 2 // Bibliotecario
        ]);
        Usuario::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'CUIL' => '20-11223344-5',
            'domicilio' => 'Boulevard de los Sueños Rotos 789',
            'telefono' => '1122334455',
            'email' => 'usuario@gmail.com',
            'contrasenia' => Hash::make('usuario'),
            'id_rol' => 3 // Usuario
        ]);

        Categoria::create(['categoria' => 'Ficción']);
        Categoria::create(['categoria' => 'Histórico']);
        Categoria::create(['categoria' => 'Poesía']);
        Categoria::create(['categoria' => 'Fantasía']);

        Procedencia::create(['procedencia' => 'Donación']);
        Procedencia::create(['procedencia' => 'Compra']);

        Destino::create(['destino' => 'Destrucción']);
        Destino::create(['destino' => 'Reparación']);
        Destino::create(['destino' => 'Donación']);
        
        Libro::create([
            'ISBN' => '978-607-11-1645-2',
            'titulo' => 'La sombra del viento',
            'autor' => 'Carlos Ruiz Zafón',
            'editorial' => 'Planeta',
            'anio_publicacion' => '2001',
            'cantidad' => 5,
            'id_categoria' => 1, // Ficción
            'id_procedencia' => 1, // Donación
        ]);

        Libro::create([
            'ISBN' => '978-950-04-0640-3',
            'titulo' => 'Rayuela',
            'autor' => 'Julio Cortázar',
            'editorial' => 'Sudamericana',
            'anio_publicacion' => '1963',
            'cantidad' => 3,
            'id_categoria' => 1, // Ficción
            'id_procedencia' => 2, // Compra
        ]);

        Libro::create([
            'ISBN' => '978-950-06-0366-1',
            'titulo' => 'Fervor de Buenos Aires',
            'autor' => 'Jorge Luis Borges',
            'editorial' => 'Emecé Editores',
            'anio_publicacion' => '1923',
            'cantidad' => 2,
            'id_categoria' => 3, // Poesía
            'id_procedencia' => 1, // Donación
        ]);

        Libro::create([
            'ISBN' => '978-607-07-3921-4',
            'titulo' => 'Pedro Páramo',
            'autor' => 'Juan Rulfo',
            'editorial' => 'Fondo de Cultura Económica',
            'anio_publicacion' => '1955',
            'cantidad' => 6,
            'id_categoria' => 1, // Ficción
            'id_procedencia' => 2, // Compra
        ]);

        Libro::create([
            'ISBN' => '978-950-07-6076-8',
            'titulo' => 'Breve historia del tiempo',
            'autor' => 'Stephen Hawking',
            'editorial' => 'Crítica',
            'anio_publicacion' => '1988',
            'cantidad' => 4,
            'id_categoria' => 2, // Histórico
            'id_procedencia' => 1, // Donación
        ]);

        Libro::create([
            'ISBN' => '978-968-16-4043-1',
            'titulo' => 'México: Biografía del poder',
            'autor' => 'Enrique Krauze',
            'editorial' => 'Tusquets',
            'anio_publicacion' => '1997',
            'cantidad' => 3,
            'id_categoria' => 2, // Histórico
            'id_procedencia' => 2, // Compra
        ]);

        Libro::create([
            'ISBN' => '978-987-566-893-2',
            'titulo' => 'Historia de América Latina',
            'autor' => 'Marcelo Cavarozzi',
            'editorial' => 'Edhasa',
            'anio_publicacion' => '2010',
            'cantidad' => 5,
            'id_categoria' => 2, // Histórico
            'id_procedencia' => 2, // Compra
        ]);

        Libro::create([
            'ISBN' => '978-84-9181-705-2',
            'titulo' => 'Sapiens: De animales a dioses',
            'autor' => 'Yuval Noah Harari',
            'editorial' => 'Debate',
            'anio_publicacion' => '2014',
            'cantidad' => 6,
            'id_categoria' => 2, // Histórico
            'id_procedencia' => 1, // Donación
        ]);

        Libro::create([
            'ISBN' => '978-950-12-1306-1',
            'titulo' => 'Historia Argentina',
            'autor' => 'Félix Luna',
            'editorial' => 'Planeta',
            'anio_publicacion' => '1994',
            'cantidad' => 2,
            'id_categoria' => 2, // Histórico
            'id_procedencia' => 2, // Compra
        ]);
        
        //Solo el usuario puede tener prestamos
        Prestamo::create([
            'id_usuario' => 3, // Carlos López
            'id_libro' => 1, // Don Quijote de la Mancha
            'fecha_prestamo' => now()->subDays(7), 
            'fecha_devolucion' => now()->subDays(5), 
        ]);
        Prestamo::create([
            'id_usuario' => 3, // Carlos López
            'id_libro' => 2, // La sombra del viento
            'fecha_prestamo' => now()->subDays(3), // 3 días atrás
            'fecha_devolucion' => null
        ]);
    }
}
