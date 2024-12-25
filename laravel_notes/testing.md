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

# Test unitario

Semanticamente se utiliza:
__Feature test__ prueba el circuito completo
```php artisan make:test NameTest```

__Unit test__ piezas de codigo
```php artisan make:test NameTest --unit```

Para nombrar los metodos de la clase NameTest se usa test_name_snake_case()
Para ejecutar un test
```php artisan test```



# Test de integración

