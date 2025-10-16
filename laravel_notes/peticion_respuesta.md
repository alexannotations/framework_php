# Middleware

Filtro de peticiones HTTP en un sistema (capa de lógica adicional de filtrado). Su configuración la podemos encontrar en _./app/Http/kernel.php_
Para proteger una Ruta o Recurso en el archivo de enrutado se agrega el metodo ```middleware('<nombre route middleware>','<pueden ser varios middleware>')```
o un controlador en el constructor. Pero no deben usarse al mismo tiempo.

En laravel 6 en __./app/Http/Kernel.php__ tenemos las rutas middleware de la aplicaciión ``` $routeMiddleware ```

Middleware Personalizado
``` php artisan make:middleware Subscribed ```
``` php artisan make:middleware VerifyAge ```
y en el archivo de rutas
``` ->middleware('auth', 'subscribed', 'verify-age'); ```





# Request

El request es la clase que contiene la información que llega de una petición hecha al servidor, puede ser por GET (parametros en la url) o POST (ej. de un formulario).



```php
Request $request;
// http://localhost/home?title=hola
$request->query('title', 'Default');  // hola

// http://localhost/home
$request->query('title', 'Default');  // Default

```


Las clases ClassRequest filtran las peticiones HTTP para asegurarnos que los datos recibidos cumplen ciertos criterios.



## Fake PUT ,PATCH y DELETE

Vista index
```php
<td>{{ $expense->title }}</td>
<a href="/expense_reports/{{ $expense->id }}/edit">Edit</a>
```

Vista edit
```php
<div>Edit report{{ $expense->title }}</div>
<-- envia a ExpenseReportController@update  PUT|PATCH -->
<form method="post" action="/expense_reports/{{ $expense->id }}">
    @csrf
    @method('put')
    <-- ... -->
</form>
```

Vista delete
```php
<-- envia a ExpenseReportController@delete DELETE -->
<form action="/expense_reports/{{ $expense->id }}" method="post">
	@csrf
	@method('delete')
	 <input type="submit" name="submit" value="Delete" 
	onclick="return confirm('Estas seguro?');"/>
</form>
```



# Validación

Hay varias formas de validar la información recibida; por metodo ``` $request->validate(); ``` o por clase, creaando un Request en _./app/Http/Request/ClassRequest.php_ con ``` php artisan make:request ClassRequest ``` la cual tiene en general reglas de validación y mensajes de error.

Cuando se generan errores de validación se incluyen en un objeto _Errors_
```php
@if($errors->any())
<div><ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul></div> 
@endif
```

Con el auxiliar @old se pueden recuperar los valores previamente capturados
```value="{{ old('nombre_del_campo') }}"```


## Validación de archivos

El método `validate` utiliza la información proporcionada por el cliente, como la extensión del archivo y el tipo MIME del archivo enviado en los encabezados de la solicitud. Esto se hace a través de la regla de validación `mimes` o `mimetypes`.

### **magic bytes**
Los **magic bytes** son una secuencia específica de bytes al inicio de un archivo que identifica su tipo real, independientemente de su extensión o tipo MIME. Este método es más confiable para determinar el tipo de archivo, ya que no depende de la información proporcionada por el cliente.

