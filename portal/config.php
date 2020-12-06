<?php

/**
 * ============================================
 * CONFIGURACIÓN DEL SISTEMA
 * ============================================
 */

/**
 * Configuracion del la ruta del framework
 * 
 */
$config['path_system']='../sys_kllmp';

/*
 * zona horaria revisar la lista permitida en la pagina oficial de php
 * https://www.php.net/manual/es/timezones.php
 **/
$config['timezone']='America/Mexico_City';

/*
 * Muestra/Oculta los errores
 * 1 muetra , 0 oculta
 **/
 $config['debug']=1;



 /**
 * ============================================
 * CONFIGURACIÓN DEL APLICATIVO
 * ============================================
 */

$config['path_controller']='controllers';

$config['default_controller']='Home';
$config['default_action']='Index';

$config['uri_workspace']='/portal/';


$config['index_page']='';
$config['base_url']='http://localhost:8080/portal/';


$config['foler_views']='views';
$config['template_error']='error/template.php';
