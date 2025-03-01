<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


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












4-npm install

5- php artisan migrate php artisan serve

layout= plantilla para las demas paginas

6-php artisan make:model Proyecto -all 
crear clases para crud
pagina 22 migraciones




