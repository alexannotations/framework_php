# Controllers

El controlador esta integrado por una serie de funciones que estan destinadas a controlar una vista, o para añadir acciones apoyandose de los modelos para acceso a persistencia por medio de ORM.

Para crear un controlador
```php artisan make:controller CamelCaseNameControlller```
en la ubicación _/app/Http/Controllers/_


## ORM Eloquent
Se basa en el patron de diseño Active Record, con el que concatenamos metodos estaticos para describir los datos a buscar.

Tambien cuenta con la clase _DB_ que permite hacer consultas SQL puras o con sus metodos de acceso.
