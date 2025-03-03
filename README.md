

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

-Ahora hay que añadir nuestros campos indicando primero el tipo de campo que es (string,integer...)

-Una vez creado ejecutamos el comando php artisan migrate para que se cree la tabla.

3. Añadir campos a la tabla
-De momento no hace falta, pero si quisieramos añadir campos habria que hacer lo siguiente.

Lo vamos a hacer utilizando las migration con el siguiente comando php artisan make:migration add_*nombre del campo* --table=proyectos.

-Esto lo que hace es crear una nueva clase en migrations cuya función es hacer modificaciones a la tabla.

-Dentro de esta clase ponemos el/los campo que queramos añadir.

4. Crear valores
-Dentro del factorie devolvemos valores falsos gracias al atributo del factory faker();

-En config/app.php podemos modificar la linea *'faker_locale' => 'es_ES'* para cambiar el idioma a español

5. El seeder
Lo que vamos a hacer ahora es configurar las clases del seeder para asi obtener los datos del factory e insertarlos en la base de datos.

-Primero modificamos la clase DatabaseSeeder.php y le decimos que llame a la de ProyectoSeeder.php

-Ahora en la de Proyecto ponemos que acceda al factory y lo cree 3 veces.

-Por ultimo con el comando *php artisan migrate:fresh --seed* nos encargamos de refrescar toda la base de datos y con esto añadir lo que hemos especificado en el seeder.

6. Modificar Modelo


### Los Metodos

1. Index(): Listar todos los proyectos
-Dentro del controller del proyecto, hacemos una funcion que devuelva las filas y las columnas de la tabla de la base de datos, excluyendo el created_at y updated_at y por ultimo devolviendo la ruta de la vista proyectos.listado.

-Ahora toca crear esta vista, gracias a 2 bucles podemos crear la tabla con los proyectos y sus campos.

-En web.php creamos una ruta que acceda al metodo index() del controlador de proyectos y le ponemos un name.

-Despues creamos un boton en el main (dentro de @auth) para acceder a esta ruta, por lo tanto a esta vista.


2. Create(): Crear un proyecto
-Para crear un proyecto hay que modificar varias clases como la de listado.blade.php, ProyectoController.php, Store, UpdateProyectoRequest.php y crear una vista llamada crear.blade.php dentro de proyectos.

-Primero en la vista de listado crear un botón para dirigir a la vista de crear el proyecto.

-Despues en la vista de crear tenemos que hacer el formulario, en cada campo ponemos el valor de name para que corresponda con el de la tabla de la base de datos. Tambien ponemos el metodo old para que si hay un error el campo no se vacie. Tambien ponemos un campo para mostrar los errores que previamente definimos en la clase store.

-En el modelo tenemos que definir los campos que se introducirar desde el formulario.

-En la clase store y update tenemos que devolver el valor true.

-Dentro del controller de proyecto en el metodo create() simplemente tenemos que devolver la vista del crear, y en el metodo store especificamos los campos que va a recoger y redirigimos a el metodo index de esa misma clase.

-Por ultimo creamos un mensaje de que el proyecto ha sido creado correctamente en la clase de listado, esto lo hacemos mediante una session que guarda desde el metodo store() un mesaje diciendo que el proyecto ha sido creado. Gracias a un if en la vista crear de que la session existe podemos mostrarla.

### Editar un proyecto
-Esta accion es muy parecida a la de crear, vamos a tener que modificar la clase de ProyectoController, la vista de listado y crear una nueva vista llamada editar.

-Primero en la clase listado añadimos un boton al lado de cada proyecto que redirigira al metodo de editar devolviendo tambien el id de la fila en la que se encuentra.

-Dentro de controller modificamos la funcion de edit, esta recogera el id que le hemos dado anterior mente y nos enviara a la vista editar, el id lo añadira en la ruta de la vista.

-En la vista de editar basicamente tenemos que copiar la vista de crear pero modificando en ella que los valores por defecto de los input pertenezcan al del proyecto que estamos editando.


### Borrar un proyecto
-Este metodo es el mas simple, modificamos la vista listado y el metodo destroy() del controller de proyecto.


## Cambiar Idiomas

### Instalar paquete 
1.
-Con el comando *composer require laravel-lang/lang* instalamos el paquete de lenguaje.

-Ahora con el comando *php artisan lang:publish* publicamos los idiomas

-Para instalar el idioma es, en, it *php artisan lang:add es*x3

2. Desde el fichero .env ponemos el idioma en ingles ya que es el idioma base de las traducciones

### Realizar la aplicacion de traduccion

-Creamos un layout nuevo que nos servira de base para crear un elemento (un desplegable) que sirva para seleccionar los idiomas

-Ahora creamos en /config un archivo languages.php donde dentro especificamos un return con los idiomas y sus banderas.

-Ahora vamos a crear un middleware para que al hacer cualquier accion coja como idioma el que tendremos almacenado en una varieble de sesion. Para crear el middleware lo hacemos a traves de este comando *php artisan make:middleware LanguageMiddleware*

-Este middleware lo que hace es que si ya hay un locale en session se pone en la aplicacion el locale actual de la session, si no pone en la session el locale actual de la applicacion

-Ahora en /bostrap app.php ponemos que use este middleware

-Hacemos un controller con *php artisan make:controller LanguageController*









    










4-npm install

5- php artisan migrate php artisan serve

layout= plantilla para las demas paginas

6-php artisan make:model Proyecto -all 
crear clases para crud
pagina 22 migraciones




