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
NOTA: Abrí tu terminal en la raíz del proyecto.
Para correr las migraciones. Ejecutá este comando:
    php artisan migrate

Realizamos las conexiones entre los modelos.
Relacion uno a muchos entre ROLES y USUARIOS.
Relacion uno a muchos entre CATEGORIAS y LIBROS.
Relacion uno a muchos entre PPROCEDENCIAS y LIBROS.
Relacion uno a muchos entre DESTINOS y LIBROS.
Relacion uno a muchos entre PRESTAMOS y LIBROS.
Relacion uno a muchos entre PRESTAMOS y USUARIOS.

Generamos los controladores de todas las tablas utilizando estos comandos que nos generan el CRUD necesario para gestionar los modelos.
php artisan make:controller RolController --resource
php artisan make:controller CategoriaController --resource
php artisan make:controller ProcedenciaController --resource
php artisan make:controller DestinoController --resource
php artisan make:controller LibroController --resource
php artisan make:controller UsuarioController --resource
php artisan make:controller PrestamoController --resource

NOTA: "No application encryption key has been specified." Ese error aparece porque Laravel no tiene una clave de encriptación (APP_KEY) configurada en tu archivo .env
Abrí tu terminal en la raíz del proyecto.
Ejecutá este comando:
    php artisan key:generate

Configuramos el método index() de RolController para obtener todos los roles desde la base de datos (Está vacío todvía) y los pusimos en una vista sencilla para probar.
En el método store() de RolController se configuró el código para crear un nuevo rol. En el modelo de Rol vamos a configruar el $fillable.
Se configuró el método create() de RolController para preparar lo que va usar la vista blade. 
También, configuramos el método show() de RolController para buscar un rol en específico por la ID.
Configurado los métodos update() y delete() que son internos del sistema.
Todos tienen su ruta de acceso, es decir la conexión entre la ruta web que mostrará la vista y un método del CRUD en el controlador.

En el modelo Usuario, Para resolver si el usuario es un bibliotecario se creó un campo tipo appends (datos que se deducen de otros datos ya alamacenados).

Especificamos en los argumentos de los modelos cuál es la columna que los une porque en la base de datos se entiende, pero al usar appends no está del todo claro para Laravel.