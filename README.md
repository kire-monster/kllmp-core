# Mini-Framework: Kill Me Please

Mini-framework minimalista para trabajar en modelo MVC.

**¿Por qué este proyecto**
En la actualidad estamos tan acostumbrados a que los frameworks y librerías realicen todo el trabajo llevándonos a olvidar  _"el porqué de las cosas"_, este framework es demasiado minimalista, tanto que debemos hacer toda la lógica. La idea principal de este proyecto es simplemente dividir esta lógica. Pero no se preocupen también pueden importar librerías externas o crear sus propias librerias e integrarlas al mini-framework.

## Estructura
~~~
kllmp-core
\_ .sys_kllmp
    └ core_mvc
    └ http
\_ apis
    └ controllers
\_ portal
    └ controllers
    └ views
~~~

- **.sys_kllmp**
La lógica del framework, puede trabajar en Apis Rest (http) o en forma MVC (core_mvc)

- **apis**
carpeta con un ejemplo de apis, es importante tener el archivo de configuracion (config.php), este es esencial para que corra el framework.

- **portal**
Carpeta de ejemplo para trabajar en capas (MVC), es importante tener el archivo de configuración (config.php), este es esencial para que corra el framework. Cabe destacar que no se encuentra ninguna carpeta models o modelo, ya que se puede trabajar sin modelos, al pasar los datos por el método vista como parámetro, o bien pueden crear y definir sus propios modelos.

## Controladores
Acceder al espacio de nombre (namespace) ```kllmp\Controllers``` y utilizar la clase base ```kllmp_Controller```. Es muy importante que el controlador sea heredado de la clase base, ademásel nombre de la clase debe ser igual al nombre que el archivo, esto para tener una nomenclatura.

### Metodos
**fnMethod(string $method)**
Verifica si el método que recibe como parámetro (GET, POST, PUT, DELETE, etc.) es igual al **REQUEST_METHOD** si **NO** coincide retorna **status code 405 Method Not Allowed**, es recomendable llamarlo al inicio del método del controlador.

**vista(string vista, array datos)**
Este método recibe como parámetro el nombre de la vista y los datos que se deseen enviar a la vista, el nombre de la vista puede tener la extensión si no la incluye automáticamente le agregara la extensión .php, el parámetro de datos recibe solamente un array con los datos que serán enviados a la vista, este último se puede omitir si se desea.
**Nota:** Este método no se encuentra disponible en APIs (```Api\Http```).


## Archivo de configuración
Es un fichero muy importante, en él se encuentra la configuración del sistema (.sys_kllmp), así como del aplicativo (portal o apis).

**CONFIGURACIÓN DEL SISTEMA**

```$config['path_system'] ```: La ubicación de la carpeta .sys_kllmp.
```$config['timezone'] ```: Asigna la zona horaria del servidor, revisar la lista permitida en la [página oficial de php](https://www.php.net/manual/es/timezones.php).
```$config['debug'] ```:  Modo debug, muestra/oculta los errores, depende del estado en que este (verdadero falso).
```$config['type_uri'] ```: Configuración del tipo de URI, acepta actualmente dos tipo;  REQUEST_URI, PATH_INFO.

**CONFIGURACIÓN DEL APLICATIVO**

```$config['path_controller'] ```: Carpeta que contendrá todos los controladores.
```$config['default_controller'] ```: Controlador de default.
```$config['default_action'] ```: Acción o método default del controlador.
```$config['uri_workspace'] ```: Espacio de trabajo, es la ruta en la cual estaremos trabajando será omitida en el URI.
```$config['foler_views'] ```: Carpeta que contendrá todas nuestras vistas.
```$config['template_error'] ```: Plantilla de errores generados por el framework.
```$config['libraries'] ```: array de librerías o módulos, esto para no estar cargando cada vez, en cada controlador.
