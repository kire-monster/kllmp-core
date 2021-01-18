<?php

if(!file_exists('config.php')){
  http_response_code(500);
  die('No se econtrol el archivo de configuracion local, favor de revisar');
  exit(1);
}

include('config.php');

DEFINED('PATH_FRAMEWORK') OR DEFINE('PATH_FRAMEWORK' , (substr($config['path_system'], -1)!='/')? $config['path_system'] .'/': $config['path_system']);

include PATH_FRAMEWORK . '/core_mvc/AppServer_kllmp.php';
include PATH_FRAMEWORK . '/core_mvc/kllmp_Controller.php';
include PATH_FRAMEWORK . '/core_mvc/functions.php';


use kllmp\Core\AppServer_kllmp;
$app = new AppServer_kllmp();
$app->Run($config);
