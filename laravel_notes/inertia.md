```composer require inertiajs/inertia-laravel```

(opcional) Despues de instalar jetstream (o Breeze)
```php artisan jetstream:install inertia```

La forma de nombrar un componente es con CamelCase, normalmente con dos palabras.
Inertia hace distinción de directorio entre Component y Page llamada desde el controlador.
__app.js__ es el archivo de configuracion donde se indica como se resuelven los PageComponent
