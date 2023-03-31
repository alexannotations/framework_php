# [Symfony](https://symfony.com/)

# Peticion - Procesamiento - Respuesta (o solicitud)
Todo comienza con una ruta, la ruta (en este caso) se coloca en el mismo controlador.
El controlador con la ruta hace que se responda con un metodo que tiene la construccion de un formulario,
que guarda en base de datos, consulta una tabla, y retorna la informacion.
para usar render(), createForm(), redirect() se usa el controlador base AbstractController
Entity - Form - para consultar y salvar se usa el administrador de entidades EntityManagerInterface
Entity es la representacion de una tabla
migrations es la estructura inicial de como se crea la tabla en la DB
Repository es la clase que permite hacer consultas.
Controller administra las peticiones, 
templates el controlador genera una vista, la cual se basa en una plantilla, partiendo de un archivo base



## crear un proyecto
``` symfony new nombre_proyecto ```
las opciones se pueden ver con ``` symfony new --help ```
Para probar el sistema ejecutamos ``` symfony serve```

## Estructura de carpetas **--webapp**

- assets: instala todo el sistema frontend sin procesar (raw), los - - archivos finales se guardan en public
- public: es la raiz del sistema, con el frontend procesado
    - index.php representa al patron front controller, porque maneja todas las peticiones y solicitudes web
- bin: archivo ejecutable desde la consola, con comandos para crear
- config: archivos de configuracion para los paquetes
- migrations: sistema de versiones de las tablas de base de datos
- src: donde se almacena la app con Controladores, Entidades y Repositorios
- templates: plantillas o vistas en formato twig
- translations: diccionario de traduccion, para sistemas multi idioma
- var: archivos de cache y registros
- vendor: paquetes y proyectos instalados a nivel de php
    - .env configuracion de entorno para cada computadora
    - composer.json instala los paquetes requeridos a nivel backend
    - package.json instala los paquetes requeridos a nivel frontend
    - webpack.config.js configuracion necesaria respecto al frontend, produce lo necesario dentro de public

Lista los comandos disponibles cada vez que se instala un nuevo componente    ``` php bin/console ```
Se puede obtener ayuda para los comandos ``` php bin/console func:foo --help ```



## env
configuracion del entorno en symfony
```
APP_ENV=dev    # prod | dev
```

## debug
Instala una barra en el modo dev, se puede usar el comando _dump die_ **dd()**
    ``` composer require symfony/debug-pack ```


## routes



## Controller
porceso HTTP

peticion, procesamiento y respuesta     Ruta + controlador= página web
el flujo http activa una ruta que apunta a un controlador,
despues se verifica si el metodo o accion exite, 
por lo que se trabaja con el sistema de ruta de foma directa

se conecta a la raiz del proyecto
cuando se conecta a la raiz del proyecto, activa el metodo home
con esto conseguimos poder trabajar la ruta directamente     ``` #[Route('/')] ```



# templates
sistema de plantillas con motor de plantillas twig
    ``` composer require symfony/twig-pack ```
si una plantilla necesita vincularse a un archivo estatico (imagenes, CSS, JS), Symfony proporciona la función Twig **asset()** para generar esas URLs
    ``` composer require symfony/asset ```



## database
Agregar los controladores ORM
    ``` composer require symfony/orm-pack ```
y en **.env**  la variable __DATABASE_URL__ segun el DBRM
crea la base de datos especificada en __DATABASE_URL__     ``` php bin/console doctrine:database:create ```

## Entity
La tabla se crea a partir de una entidad
Una entidad es una representacion en php de la tabla en la DB
Se requiere instalar un componente en el entorno de desarrollo ``` composer require symfony/maker-bundle --dev ```
La tabla se crea con ``` php bin/console make:entity ``` que se almacena en la carpeta _src/Entity_

## migrations
Las migraciones permiten trabajar con un sistema de versiones
Cuando esta terminada la entidad, se hace la migracion  ``` php bin/console make:migration ``` que es la estructura inicial de las tablas, creando los archivos en _migrations_.
Para convertir el archivo php de _migrations_ en una tabla real en la DB ``` php bin/console doctrine:migrations:migrate ```
En la base de datos se crea la tabla indicada y otra donde se guarda un registro del control de versiones
Generalmente no se modifican los archivos de _migrations_, se modifica la entidad y despues se altera a las migraciones, las cuales se convierten en tablas en la DB


