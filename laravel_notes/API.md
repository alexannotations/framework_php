## HTTP status codes

- __1XX__ Respuestas Afirmativas
- __2XX__ Respuestas satisfactorias
- __3XX__ Re-direcciones
- __4XX__ Error del cliente  
     HTTP 418 I'm a teapot
- __5XX__ Error de servidor



## Verbos HTTP

- __GET__: solicitar recurso (fetch).
- __HEAD__: traer headers. Es util para comprobar si lo que se envia es correcto y puede ser procesado.
- __POST__: enviar datos para crear un recurso.
- __PUT__: actualizar completamente un recurso (editar).
- __PATCH__: reemplazar parcialmente un recurso (editar).
- __DELETE__: eliminar un recurso.



## Versionado
__Media Type (Accept Header)__: Una alternativa o complemento al versionado de URL es utilizar el encabezado Accept para especificar la versión de la API. Esto se considera una forma más "pura" de versionado de REST, pero puede ser más complejo de implementar y no es tan amigable para la exploración directa de la API en el navegador.

Solo numeros, fecha como versión, o con algun prefijo como _v_.



## Buenas practicas
- Utilizar sustantivos en plural referentes a los modelos.
- Nunca utilizar verbos referentes a la petición.
- Consistencia entre endpoints: Resources y Collections (los envia dentro de "data")



## Autenticación y Autorización
- Autenticación: Quien es y si tiene acceso.
 - Verificación de credenciales: El sistema revisa si las credenciales ingresadas son correctas.
 - Caducidad de credenciales: También comprueba si esas credenciales han caducado o están vigentes.
 - Acceso inicial: Una vez verificada, al usuario se le otorga una llave o token para acceder al sistema.
- Autorizacion: Gestiona los permisos de que se puede hacer.
 - Gestión de permisos: Basado en roles predefinidos (ej. administrador, usuario estándar), se otorgan ciertos privilegios.
 - Acceso a recursos: Determina qué partes del sistema el usuario puede o no acceder, como crear productos, cambiar configuraciones, o acceder a determinadas características.

Los JSON Web Tokens son una tecnología de autenticación y autorización que utiliza un enfoque sin estado (Stateless).
 - Token como llave: Los JWT actúan como "llaves" que almacenan la información de los permisos y la autenticación.
 - Escalabilidad y robustez: Facilitan la distribución de sistemas, permitiendo que las sesiones de usuario se gestionen más eficientemente.
 - Independencia del backend: Al no depender de una sesión en el backend, los JWT ofrecen flexibilidad y seguridad adicional en la gestión de usuarios.

