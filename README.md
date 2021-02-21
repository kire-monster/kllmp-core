# Mini-Framework: Kill Me Please

Mini-framework minimalista para trabajar en modelo MVC.


## Estructura
~~~
kllmp-core
\_ .sys_kllmp
    └ Core
\_ portal
    └ controllers
    └ views
~~~

- **.sys_kllmp**
El core del framework, puede trabajar en forma MVC

- **portal**
Carpeta de ejemplo para trabajar en capas (MVC), es importante tener el archivo de configuración (config.php), este es esencial para que corra el framework. Cabe destacar que no se encuentra ninguna carpeta models o modelo, ya que se puede trabajar sin modelos, al pasar los datos por el método vista como parámetro, o bien pueden crear y definir sus propios modelos.

## Controladores
Acceder al espacio de nombre (namespace) ```kllmp\Http``` y utilizar la clase base ```REST_Controller```. Es muy importante que el controlador sea heredado de la clase base, ademásel nombre de la clase debe ser igual al nombre que el archivo, esto para tener una nomenclatura.

### Metodos
**fnMethod(string $method)**
Verifica si el método que recibe como parámetro (GET, POST, PUT, DELETE, etc.) es igual al **REQUEST_METHOD** si **NO** coincide retorna **status code 405 Method Not Allowed**, es recomendable llamarlo al inicio del método del controlador.


## Archivo de configuración
Es un fichero muy importante, en él se encuentra la configuración del sistema (.sys_kllmp), así como del aplicativo.

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
