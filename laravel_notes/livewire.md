# Livewire

agregar @livewireStyles y @livewireScripts en la plantilla del documento

crear componente livewire
```php artisan make:livewire homeComponent```


## Public properties y Data Binding
Se puede pasar un Modelo como public property, es necesario definir reglas de validacion en el componente Livewire, pero requiere un formato personalizado
__'model.property'__ =>__'rules'__.
Dado lo anterior no es posible utilizar un Request personalizado directamente.
Liveware no utiliza los metodos HTTP, hace solicitudes AJAX y WebSocket
Pero se puede obtener el array del Request y concatenarlo con el Modelo.
Las rules se pueden definir por medio del metodo ```rules()``` o el atributo ```public $rules = [];```


## Actions y Magic Actions



## Lifecycle Hooks



## Eventos
Eventos a traves de la __vista__ el cual se emite a traves del magi action $emit() y el listener con el nombre del evento y la funcion que ejecuta el evento. Se pueden pasar parametros.

A traves del __componente__ controller, no se requiere listener.

Y a traves de __javascript__ 



## SweetAlert

## Modal


