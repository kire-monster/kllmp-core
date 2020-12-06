<?php

if(!file_exists('config.php')){
  http_response_code(500);
  die('No se econtrol el archivo de configuracion local, favor de revisar');
  exit(1);
}

include('config.php');

DEFINED('PATH_FRAMEWORK') OR DEFINE('PATH_FRAMEWORK' , (substr($config['path_system'], -1)!='/')? $config['path_system'] .'/': $config['path_system']);

function scanDirFramework($dir, &$results = array()){
  $files = scandir($dir);

  foreach($files as $key => $value)
  {
    $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
    if(!is_dir($path)) 
    {
      //Es un Archivo
      $results[] = $path;
    } 
    else if($value != "." && $value != "..") 
    {
      //Es un directorio
      scanDirFramework($path, $results);
      //$results[] = $path;
    }
  }
  return $results;
}

foreach(@scanDirFramework(PATH_FRAMEWORK) as $file)
  include $file;



use kllmp\Core\AppServer_kllmp;
$app = new AppServer_kllmp();
$app::Run($config);