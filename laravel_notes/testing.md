https://laravel.com/docs/master/testing

Se manejan dos formatos de trabajo __TDD__ donde primero se escriben los test y despues se desarrolla la funcionalidad. Y __BDD__ y __ATDD__

Para probar los test se requieren datos; se escriben seeders con factories en memoria (sin persistencia). O con un sistema de persistencia de testing _.env.testing_
```php artisan migrate --env="testing"``` donde se indica que configuración se utilizara para migrar el entorno de pruebas.
Tambien se puede establecer una función:
```
public function test_set_database_config()
{
    \Artisan::call('migrate:reset');
}
```

_Ejecuta alguna acción -> Espera un resultado deseado._

Se utilizan dos tecnologias, con dos sintaxis.
- PhpUnit
- Pest

# Pruebas Unitarias (Unit Tests)
Comportamiento detallado de componentes individuales.

Semanticamente se utiliza:
__Feature test__ prueba el circuito completo
```php artisan make:test NameTest```

__Unit test__ piezas de codigo
```php artisan make:test NameTest --unit```

Para nombrar los metodos de la clase NameTest se usa _test_name_snake_case()_

## Ejecutar los test
Desde Laravel 7.3 en adelante pueden utilizar el comando ```php artisan test``` en lugar de ```vendor/bin/phpunit``` para ejecutar las pruebas



# Pruebas Funcionales (Functional Tests):

Valoran el sistema en su totalidad, evaluando integraciones entre diferentes capas de la aplicación. Son esenciales para comprobar que todas las partes del sistema trabajan conjuntamente como se espera.



# Test de integración



# Testing HTTP


