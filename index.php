<?php

define('SYSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR );

/*
 * Cargamos los archivos de configuracion
 **/
if(is_dir(SYSPATH . 'config')){
  foreach (glob(SYSPATH . 'config/*.php') as $file) {
    require_once($file);
  }
}

/*
 * Cargamos los archivos de para arrancar el mini-framework
 **/
if(is_dir(SYSPATH . 'core')){
  foreach (glob(SYSPATH . 'core/*.php') as $file) {
    require_once($file);
  }
}

$uri = @explode('/', $_SERVER['PATH_INFO']);

$segmentos = array(
  1=> ( count($uri)>1 && trim($uri[1]) )?ucfirst($uri[1]): $config['default_controller'],
  2=> ( count($uri)>2 && trim($uri[2]) )?ucfirst($uri[2]):'Index'
);

$controlador = $segmentos[1];
$metodo = $segmentos[2];


if( is_file( "controllers/$controlador.php" ) ){
  require_once( "controllers/$controlador.php" );

  if( class_exists($controlador) && method_exists($controlador, $metodo) ){
    $ob = new $controlador();
    $ob->$metodo();
  }else{
    $titulo___ = 'Error 404';
    $err___ =  " <p>No existe el manejador: <b>$controlador</b> o el Acceso: <b>$metodo</b> </p>";
    require_once('views/errors/general.php');
    exit(1);
  }
}else{
  $titulo___ = 'Error 404';
  $err___ =  " <p>No se encontro archivo: <b>$controlador</b></p>";
  require_once('views/errors/general.php');
  exit(1);
}
