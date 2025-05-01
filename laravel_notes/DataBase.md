# Sistema de base de datos

__Conceptos e Instalación__

## __migrations__
Se encuentran en */database/migrations/*
Son nombradas en _plural_
Una *migration* es una estructura inicial de las tablas, que permite tener detallados todos los cambios de la tabla en una DB
Con el comando ``` php artisan migrate ``` podemos ejecutar todas las migraciones para convertirlas en tablas, considere como accesa php a la DB. Se require una DB vacia y configurar el archivo *.env*. Y si se ha ejecutado antes llevara el control de versiones, es decir solo creara las nuevas tablas si es necesario.
Para crear una migracion ``` php artisan make:migration create_nameoftablewiths_table ``` observe que debe comenzar con *create_* y finalizar con *_table*, si se omite no se declara el schema. Dicho archivo se puede comenzar a editar.


Eliminar las tablas y vistas de la base de datos
```php artisan db:wipe --drop-views```

Ejecuta las migraciones con sus datos semilla
 ```php artisan migrate --seed```

Permite eliminar todas las tablas, y volver a migrarlas ``` php artisan migrate:fresh ```

Elimina todas las tablas y vistas, re-ejecuta todas las migraciones con sus datos semilla
  ```php artisan migrate:fresh --drop-views --seed```

Restablece (revierte) y re-ejecuta todas las migraciones con sus datos semilla
  ```php artisan migrate:refresh --seed```

Regresa un nivel de migración
  ```php artisan migrate:rollback```

Las migrations, controllers y factories tienen su origen en los models, para crear todo a partir de un model
``` php artisan make:model Post -mcf ```
O bien lo anterior más los metodos CRUD en el controller
``` php artisan make:model Post -mcf --resource ```
```php
   index()      create()      store()      show()      edit()      update()      destroy()
```

Crear un migracion nueva para alterar una tabla. Por convención se indica que se agrega una columna 'comment' en la tabla 'post'
``` php artisan make:migration create_column_comment_in_posts --table=posts ```

Crear una tabla
``` php artisan make:migration create_table_expense_reports --create=expense_reports ```
ó
``` php artisan make:migration create_expense_reports_table ```


## __factories__

Es la estructura de datos, crea datos fake para poder trabajar, fabrica de datos.
En versiones anteriores se recibia al componente _Faker_ por medio de la inyección de dependencias, ahora en Laravel 8 _Faker_ está implicito en las _factories_.
[Faker archive](https://github.com/fzaninotto/Faker) , [FakerPHP](https://github.com/FakerPHP/Faker/)



## __models__

Es una clase que representa a una la tabla para manejarla dentro del sistema laravel, se nombra en _singular_ con CamelCase. En versiones anteriores no existia una carpeta _entity_ o _model_ por lo que se almacenaba en */app/*
``` php artisan make:model ExpenseReport ```

En versiones recientes se crea el modelo en */app/Models/* con su factory */database/factories/* y Controller */app/Http/Controllers/* ``` php artisan make:model NameOfModel -fc ```

``` php artisan make:model NameModel -mf ```    Para crear un modelo con migracion y factory

Crea un Modelo y su migracion ``` php artisan make:model NameOfModel --migration ```



## __seeders__

Informacion inicial (falsa*) en nuestras tablas

``` php artisan migrate:fresh --seed ``` Se eliminan y crean nuevamente las tablas en la BD con los datos semilla



