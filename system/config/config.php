<?php

/*
 * zona horaria revisar la lista permitida en la pagina oficial de php
 * https://www.php.net/manual/es/timezones.php
 **/
$config['core']['timezone'] = 'America/Mexico_City';

/*
* Muestra/Oculta los errores
* 1 muetra
* 0 oculta
 **/
 $config['core']['display_errors'] = 1;


/*
 * configuramos el Controlador por default
 **/

$config['default_controller'] = 'Home';

/*
 * Definimosla direccion index.php
 **/
$config['index_page'] = 'index.php';
$config['base_url'] = 'http://localhost:8080/mini-framework/';
