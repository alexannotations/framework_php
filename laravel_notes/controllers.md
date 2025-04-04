# Controllers

El controlador esta integrado por una serie de funciones que estan destinadas a controlar una vista, o para añadir acciones apoyandose de los modelos para acceso a persistencia por medio de ORM.

Para crear un controlador
```php artisan make:controller CamelCaseNameControlller```
en la ubicación _/app/Http/Controllers/_


## ORM Eloquent
Se basa en el patron de diseño Active Record, con el que concatenamos metodos estaticos para describir los datos a buscar.

Tambien cuenta con la clase _DB_ que permite hacer consultas SQL puras o con sus metodos de acceso.

```Route::resource()``` Gestiona los 7 metodos
```php artisan make:controller <NameController>``` Crea un controlador
```php artisan make:controller <NameController> --resource``` Crea un controlador con las 7 funciones de un resource
```php artisan make:controller <NameController> --resource --model``` Crea un controlador con las 7 funciones de _Route::resource_ y su _modelo_

```php artisan make:model <NameModel> -r -m -c``` Crea Resource, Migration y Controller

