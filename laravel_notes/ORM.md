# ORM
Manejo de bases de datos sin escribir SQL


## Colecciones
son un conjunto de datos que permiten trabajar con grandes cantidades de información utilizando métodos intuitivos. Gracias a la clase _Collection_, podemos manipular datos de manera efectiva y ordenada; transformar, filtrar, agrupar, y más, sin necesidad de recorrer manualmente los arrays o estructuras.

```contains()``` determina si una colección contiene un elemento particular.
```except()``` o ```only()``` permite filtrar ciertos elementos de la colección quitando o seleccionando.
```with()``` carga las relaciones por adelantado y luego la consulta.
```load()``` ejecuta la consulta y luego las relaciones.



## Serialización
Es el proceso de transformar estructuras complejas de datos en formatos que puedan ser transferidos fácilmente, como arrays o JSON. En Laravel, esto se usa para manipular cómo se devuelven y presentan los datos.

__Serialización a un Array__
Podemos convertir una colección en un array puro, permitiendo trabajar con los datos de la misma forma que con un array normal. 
```$array = $users->toArray();```

__Serialización a JSON__
Convertir la colección a JSON es otro enfoque común, especialmente útil cuando se está construyendo una API. 
```$json = $user->toJson();```


## Eloquent
[eloquent](eloquent.md)
- Relaciones de tablas, unir datos
- Colecciones y Serialización, manipular la información
- Formato de datos y presentación



## Doctrine

