# Sistema de autenticacion breeze

Es una implementación de autentificación basico (login, registro, verificacion de usuarios), para instalarlo :
```composer require laravel/breeze --dev```

``` php artisan breeze:install ```

Para estructurar los proyectos utiliza platillas __Blade__ con __Tailwind__. O __livewire__. O __Vue__ o __React__ con __Inertia__- 




# Jetstream
Ofrece mas opciones que Breeze.

Laravel Jetstream utiliza dos caminos para estructurar los proyectos (livewire + blade) | (inertia.js + vue)
``` laravel new project_name_laravel8 --jet ```

Para agregar el componente jetstream
``` composer require laravel/jetstream ```
Instalación inicial:
``` php artisan jetstream:install {stack} ```
Reemplaza {stack} por la opción deseada: _inertia_ o _livewire_

``` php artisan jetstream:install livewire --teams ``` Para instalación con estilos y autenticación



## [livewire](https://laravel-livewire.com/screencasts/installation)

Interfaces dinámicas de forma simple y sencilla en forma de componentes

``` php artisan make:livewire ComponentName ```     Creación de componente _Livewire_ en _app/Http/Livewire/ComponentName.php_ y vista _component-name.blade.php_

Para insertar el componente en otra vista se usa:
'''
<livewire:component-name>
'''
Todo componente debe estar dentro de un div, y debe existir un unico contenedor.

El componente livewire renderiza la vista



# [Laravel UI](https://github.com/laravel/ui)
Es un sitema mas antiguo que utiliza CSS bootstrap.
Login, registro y autenticación de usuarios
``` composer require laravel/ui --dev ```

``` php artisan ui:auth ``` Se instala el sistema de autenticación sin estilos ni framework de javascript
``` php artisan ui bootstrap --auth ``` para estilos con bootstrap y autenticación 
``` php artisan ui vue ``` el sistema basico de vue
``` php artisan ui react ``` el sistema basico de react



# Ejecución de comandos para completar la instalación
En todos los casos de uso de framework javascript se requiere usar NPM para instalar las dependencias necesarias
``` npm install && npm run dev ``` al completarse correctamente la información de _resources/sass_ y _/js_ se compilaron y se envian a la carpeta publica  _css_ y _js_ como indica la configuración del archivo _webpack.mix.js_

