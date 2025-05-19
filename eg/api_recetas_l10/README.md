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




## Comandos y otros recursos dentro
- ``` php artisan route:list --path=api ```

[telescope](localhost/telescope)


## Notas sobre el uso para un __API client__
- Para actualizar con cliente API en el cuerpo (Body form-data) con metodo POST de la peticion se agrega el campo **_method** **PUT**. Si se trabaja con Query Parameters se selecciona PUT sin ser necesario agregar el campo **_method**. Los tags en recipe se envian como array [1,2,3]
- Otro parametro a enviar en _Headers_ para no recibir una respuesta _html_ es **Accept** e indicar **application/json**

[all](http://api_recetas_l10.test/api/v1/categories)
[one](http://api_recetas_l10.test/api/v1/categories/1)



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




## Instalación de configuración inicial

- ``` composer create-project --prefer-dist laravel/laravel api_recetas_l10 "10.*" ```
- ``` composer require laravel/telescope ```    para analisis
    - ``` php artisan telescope:install ``` ver resultados en _url.test/telescope_


