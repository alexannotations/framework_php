# Recetas API
Proyecto hecho con Laravel 10 (php 8.2)



## TODO:
Terminar los CRUD y validación de Tags y Category



## Instalar sistema desarrollo

- ``` composer install ```
- ``` configurar .env ```
- ``` php artisan key:generate ```
- ``` php artisan migrate ```
- ``` php artisan migrate:fresh --seed ```




## __``` php artisan tinker ```__
Creación de token Bearer para acceso del cliente del API
``` php
$user = App\Models\User::find(5);
$user->createToken('app_desktop');  // 'app' hace referecia al dispositivo de conexión (personal_access_tokens->name)
// copiamos plainTextToken: para pegarlo en Auth -> Bearer Token del API Client (cartero)
$user->tokens()->delete();  // elimina los tokens del usuario
``` 



## Comandos y otros recursos dentro
- ``` php artisan route:list --path=api ```

[telescope](localhost/telescope)


## Notas sobre el uso en un __API client__
- [all](http://api_recetas_l10.test/api/v1/categories)
- [one](http://api_recetas_l10.test/api/v1/categories/1)

- Enviar en _Headers_ para no recibir una respuesta _html_ el parametro **Accept** e indicar **application/json**.

- Para obtener el token desde el API Client con POST debe dirigirse a [api/login](http://api_recetas_l10.localhost/api/login) y llenar los parametros (en el body form-data) _email_, _password_ y *device_name* y la cabecera _Accept_ con _application/json_.

- Para actualizar con cliente API en el cuerpo (Body form-data) con metodo POST de la peticion se agrega el campo **_method** **PUT**. Si se trabaja con Query Parameters se selecciona PUT sin ser necesario agregar el campo **_method**. Los tags en recipe se envian como array [1,2,3].

- Para crear un recurso use POST en _Body_ -> _form-data_ con los parametros necesarios.


## Test Driven Development
Considere que esta configurado sqlite para los test, por lo que la extension debe estar habilitada
- ``` php artisan test ``` ejecutar los test
- ``` php artisan test --filter update ``` ejecutar los test de update
- 


## Algunos recursos externos utilizados


## Como se crearon los recursos
- ``` php artisan make:model Category -mf ```
- ``` php artisan make:model Recipe -mf ```
- ``` php artisan make:model Tag -mf ```
- ``` php artisan make:migration create_recipe_tag_table ```    orden alfabetico en singular
- ``` php artisan make:controller Api/CategoryController --api ```
- ``` php artisan make:controller Api/RecipeController --api ```
- ``` php artisan make:controller Api/TagController --api ```
- ``` php artisan make:resource CategoryResource ```
- ``` php artisan make:resource CategoryCollection ```
- ``` php artisan make:resource TagResource ```
- ``` php artisan make:resource RecipeResource ```
- ``` php artisan make:request StoreRecipeRequest ```
- ``` php artisan make:request UpdateRecipeRequest ```
- ``` php artisan make:controller Api/LoginController ```
- ``` php artisan make:policy RecipePolicy ```
- ``` php artisan make:test CategoryTest ```
- ``` php artisan make:test TagTest ```
- ``` php artisan make:test RecipeTest ```
- ``` php artisan make:controller Api/V2/RecipeController --api ```




## Instalación de configuración inicial

- ``` composer create-project --prefer-dist laravel/laravel api_recetas_l10 "10.*" ```
- ``` composer require laravel/telescope ```    para analisis
    - ``` php artisan telescope:install ``` ver resultados en _url.test/telescope_
- ``` composer require laravel/sanctum ``` 


