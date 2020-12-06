<?php 

/**
 * ===================================================
 * CONFIGURARIÓN DE SISTEMA
 * ===================================================
 */

$config['path_system']='../sys_kllmp';

/*
 * zona horaria revisar la lista permitida en la pagina oficial de php
 * https://www.php.net/manual/es/timezones.php
 **/
date_default_timezone_set('America/Mexico_City');

/*
 * Muestra/Oculta los errores
 * 1 muetra
 * 0 oculta
 **/
ini_set('display_errors', 1);




/**
 * ===================================================
 * CONFIGURARIÓN DE APLICACIÓN
 * ===================================================
 */

/*
 * configuramos el Controlador por default
 **/
defined('DEFAULT_CONTROLLER') or define('DEFAULT_CONTROLLER', '');

/*
 * configuramos el Metodo por default
 **/
defined('DEFAULT_METHOD') or define('DEFAULT_METHOD', '');

/*
 * Ruta a ignorar para el controlador
 **/
defined('IGNORE_URI') or define('IGNORE_URI', '/apis/');