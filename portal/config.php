<?php

/**
 * ============================================
 * CONFIGURACIÓN DEL SISTEMA
 * ============================================
 */

// Ruta del core framework
$config['path_system']='../.sys_kllmp';

/**
 * zona horaria revisar la lista permitida en la pagina oficial de php
 * https://www.php.net/manual/es/timezones.php
 */
$config['timezone']='America/Mexico_City';

// DEBUG: Muestra/Oculta los errores
 $config['debug']=true;

/**
 * Configuracion del tipo de uri
 * acepta actualmente dos tipo: REQUEST_URI, PATH_INFO
 */
$config['type_uri']='REQUEST_URI';

 /**
 * ============================================
 * CONFIGURACIÓN DEL APLICATIVO
 * ============================================
 */
// Directorio de los Controladores
$config['dir_controller']='controllers';

// Controlador por default
$config['default_controller']='Home';
// Accion o metodo por default
$config['default_action']='Index';

$config['uri_workspace']='portal/';

// Directorio de las vistas
$config['dir_views']='views';
// plantilla de error
$config['template_error']='error/template.php';

// Librerias o modulos precargados
$config['libraries'] = array();
