# Desarrollo Guiado por Pruebas (Test-Driven Development)

Primero se construyen las pruebas, y despues el codigo que debe aprobar la prueba.

## pasos

La metodología TDD tiene trece pasos a cumplir:

- __Rojo__ → El objetivo es construir la estructura de una prueba que aún no tiene implementación de código, lo que resultará en un fracaso al ejecutarse. Este fracaso es intencionado y marca el inicio del desarrollo, ya que aún no se ha escrito el código real que haga que la prueba sea exitosa.
- __Verde__ → En este paso, el desarrollador crea el código funcional que satisface las condiciones especificadas por la prueba. Una vez pasado este estado, la prueba dará un resultado exitoso confirmando que el código se comporta como se espera.
- __Refactorización__ → Mejorar el código sin cambiar su comportamiento externo. Esto puede incluir optimizar la estructura, añadir comentarios para mejorar su comprensión o simplificar alguna lógica que ha sido escrita en los pasos anteriores. Lo crucial es mantener el estado en verde, asegurándose que las mejoras no afecten la funcionalidad ya verificada.


## Configuración

Para crear un entorno de pruebas robusto, se configura una base de datos específicamente para ello. Esto asegura que los tests no interfieran con la base de datos principal ni afecten los datos reales.

- Se requiere la extensión _php-sqlite3_ y _pdo_sqlite_.
- Crear una archivo __./database/database.sqlite__
- En el archivo __./config/database.php__ cambiamos en el array de _sqlite_ en la key _'database'_ su valor a _database_path('database.sqlite'),_
 quedando: ```'database' => database_path('database.sqlite'),``` 
 - El archivo principal de configuracion de testing es _phpunit.xml_ en donde se indica la _DB_CONNECTION_ y _DB_DATABASE"_, dicha base siempre esta vacia, y se vuelve a vaciar cuando finaliza la prueba

