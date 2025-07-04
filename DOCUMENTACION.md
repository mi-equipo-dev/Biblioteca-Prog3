primer creamos las migraciones con sus respectivos modelos de:
las que no tienen FK:
roles, php artisan make:model Rol -m
categorias, php artisan make:model Categoria -m
procedencias, php artisan make:model Procedencia -m
destinos. 
utilizando el comando
php artisan make:model Rol -m
Agregamos los campos rol en la migracion de la tabla ROLS (no contamos con que nos iba a salir asi el plural automatico)
Schema::create('roles', function (Blueprint $table) {
    $table->id('id_rol');
    $table->string('rol');
});
