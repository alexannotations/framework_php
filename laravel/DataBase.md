# Sistema de base de datos

__Conceptos e Instalación__

## __migrations__

Es la estructura de una tabla a crearse en la BD.

``` php artisan migrate ``` Para crear las tablas en la BD


## __factories__

Es la estructura de datos, crea datos fake para poder trabajar, fabrica de datos.
En versiones anteriores se recibia al componente _Faker_ por medio de la inyección de dependencias, ahora en Laravel 8 _Faker_ está implicito en las _factories_.
[Faker archive](https://github.com/fzaninotto/Faker) , [FakerPHP](https://github.com/FakerPHP/Faker/)


## __models__

Es la representacion de la tabla dentro del sistema laravel

``` php artisan make:model NameModel -mf ```    Para crear un modelo con migracion y factory


## __seeders__

Informacion inicial (falsa*) en nuestras tablas

``` php artisan migrate:fresh --seed ``` Se eliminan y crean nuevamente las tablas en la BD con los datos semilla



