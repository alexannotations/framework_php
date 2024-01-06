# Jetstream
login, registro, verificacion de usuarios

Laravel Jetstream utiliza dos caminos para estructurar los proyectos (livewire + blade) | (inertia.js + vue)
``` laravel new project_name_laravel8 --jet ```

Para agregar el componente jetstream
``` composer require laravel/jetstream ```
``` php artisan jetstream:install livewire ```



## [livewire](https://laravel-livewire.com/screencasts/installation)

Interfaces dinámicas de forma simple y sencilla en forma de componentes

``` php artisan make:livewire ComponentName ```     Creación de componente _Livewire_ en _app/Http/Livewire/ComponentName.php_ y vista _component-name.blade.php_

Para insertar el componente en otra vista se usa:
'''
<livewire:component-name>
'''
Todo componente debe estar dentro de un div, y debe existir un unico contenedor.

El componente livewire renderiza la vista
