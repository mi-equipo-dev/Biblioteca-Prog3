Primero creamos las migraciones con sus respectivos modelos de:
las que no tienen FK:
roles, php artisan make:model Rol -m
categorias, php artisan make:model Categoria -m
procedencias, php artisan make:model Procedencia -m
destinos. php artisan make:model Destino -m 
utilizando el comando
php artisan make:model Rol -m
Agregamos los campos rol en la migracion de la tabla ROLS (no contamos con que nos iba a salir asi el plural automatico)
Schema::create('roles', function (Blueprint $table) {
    $table->id('id_rol');
    $table->string('rol');
});

Ahora creamos la migración y modelo de la tabla LIBROS que tiene las foreignkeys de las tablas CATEGORIAS, PROCEDENCIAS Y DESTINOS. Y le agregamos las columnas necesarias a la migración.

Ahora creamos la migración y el modelo de la tabla USUARIOS que tiene la foreignkey de la tabla ROLS. Y le agregamos las columnas necesarias a la migración.

Ahora creamos la migración y el modelo de la tabla PRESTAMOS que tiene la foreignkey de la tabla USUARIOS y la tabla LIBROS. Y le agregamos las columnas necesarias a la migración.

Finalizamos la creacion y carga de las migraciones.

Realizamos las conexiones entre los modelos.
Relacion uno a muchos entre ROLES y USUARIOS.
Relacion uno a muchos entre CATEGORIAS y LIBROS.
Relacion uno a muchos entre PPROCEDENCIAS y LIBROS.
Relacion uno a muchos entre DESTINOS y LIBROS.
Relacion uno a muchos entre PRESTAMOS y LIBROS.
Relacion uno a muchos entre PRESTAMOS y USUARIOS.


