

# APUNTES

# Instalación proyecto laravel
1-laravel new proyecto
Breeze
Blade
no
1
mysql
yes

## Subir proyecto a github
1-git init
2-git add *
3-git commit -m "mi primer commit"
4-git branch -M main
5-git remote add origin https://github.com/miguelgilp8/Laravel_crud.git
6-push -u origin main

### instalar daisy

npm i -D daisyui@latest

### configurar acceso base de datos
1-crear docker-compose.yaml
2-rellenar con:
services:
mysql:
image: mysql
volumes:
- mysql:/var/lib/mysql
environment:
- MYSQL_USER=${DB_USERNAME}
- MYSQL_PASSWORD=${DB_PASSWORD}
- MYSQL_ROOT_PASSWORD=${DB_ROOT_PASSWORD}
- MYSQL_DATABASE=${DB_DATABASE}
ports:
- ${DB_PORT}:3306
phpmyadmin:
image: phpmyadmin
environment:
- PMA_ARBITRARY=1
- PMA_HOST=mysql
depends_on:
- mysql
ports:
- 8100:80
volumes:
mysql:

3-modificar el archivo .env
DB_PORT=23306
DB_DATABASE=laravel_crud
DB_USERNAME=alumno
DB_PASSWORD=alumno
DB_ROOT_PASSWORD=root12345


### Crear el layout principal
1. Instalar el gestor de paquetes npm
   (npm install)
2. Instalar componente daisy (instalado anteriormente)
3. Configurar archivo tailwind.config.js para poder usar daisy
-Añadir plugins: [forms, require("daisyui")],
4. Crear la vista principal main.blade.php en /views. 
5. Crear un controlador con php artisan make:controller MainController y poner una funcion para redirigir a esta vista.
6. Desde web.php crear la ruta para redirigir con /index al controlador y que ejecute la funcion


### Crear login con breeze
1. Dar estilo al layout principal, a los complementarios (header, footer ...) y a la pagina principal.
2. Crear los botones del login y del register y hacer mediante el @auth que si el usuario esta logeado le aparezca un boton de logout e su lugar
3. Modificar la vista del register y del login dentro de auth.
4. Desde los controladores de AuthenticatedSessionController y de RegisteredUserCotroller modificamos la ruta que te redirige el login, register y logout para que vayan a la pagina de main, para el login y el register utilizamos un name previamente definido en web.php

## Crear CRUD

### Crear un controller
1. Creamos un controller llamado proyecto (nombre de la tabla a gestionar), este controller lo hacemos con php artisan make:controller proyecto --resource, esto ultimo para que asi cree 7 metodos necesarios con las funciones del crud.
2. Funciones:
-index(): lista todos los proyectos.
-delete($proyecto): Elimina un proyecto.
-show($proyecto): Muestra un proyecto en especifico.
-create(): formulario para crear un proyecto
-store($request): almacena el proyecto del formulario de create
-edit($proyecto): formulario para modificar proyecto(se muestran sus datos actuales)
-update($request, $proyecto): guarda los datos del proyecto editado de edit

3. Este controller lo podriamos crear asi pero en su lugar vamos a ejecutar un comando para crear este controller y mas clases necesarias para el crud

### Crear el model
Con el comando php artisan make:model Proyecto --all creamos todas las clases necesarias para gestionar el crud

1. Creamos las siguientes clases:
-Controlador (app/Http/Controllers/ProyectoController): Controlador nombrado anteriormente con todos los metodos.
-Request: (app/Http/Requests/Store y UpdateProyectoRequest.php): Validacion y autorizaciones.
-Modelo (app/Models/Proyecto.php): Interactuar con la base de datos.
-Policies (app/Policies/ProyectoPolicy.php): Verificar accesos.
-Factories (Database/factories/ProyectoFactory.php): Crear valores para las filas. 
-Migration (Database/migrations/fechaDeHoy_create_proyectos_table.php): Crear la tabla.
-Seeder (Database/seeders/ProyectoSeeder.php): Insertar los datos creados en las tablas.

2. Crear Migracion
-Al haber creado el modelo la migracion esta creada también con su respectivo código dentro de los metodos, ya lista para ejecutarla y poder crear la tabla proyectos. 

-Si no estuviera creada tendriamos que hacerlo con el comando *php artisan make:migration proyectos --create=proyectos*, esto ultimo para que rellenara los metodos con código.

-Las funciones son las de up() (se ejecuta cuando hacemos la migracion) y la de down(se ejecuta al deshacer la migracion).
La funcion de up contiene el metodo id() que crea un campo clave auntoincremental y el meteodo timestamps() que crea el campo updated_at y created_at que muestra cuando se ha creado o actualizado la tabla.

3. Añadir campos a la tabla
-De momento no tenemos campos en nuestra tabla po lo tanto hay que añadir: titulo(string), horas_previstas(integer), fecha_comienzo(date).





    










4-npm install

5- php artisan migrate php artisan serve

layout= plantilla para las demas paginas

6-php artisan make:model Proyecto -all 
crear clases para crud
pagina 22 migraciones




