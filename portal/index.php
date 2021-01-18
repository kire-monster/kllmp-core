<?php

if(!file_exists('config.php')){
  http_response_code(500);
  die('No se econtrol el archivo de configuracion local, favor de revisar');
  exit(1);
}

include('config.php');

DEFINED('PATH_SYSTEM') OR DEFINE('PATH_SYSTEM' , (substr($config['path_system'], -1)!=='/')? $config['path_system'] .'/': $config['path_system']);

include PATH_SYSTEM . 'init.php';
