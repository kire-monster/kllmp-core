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
    showErrorHtml('views/errors/general.php', 500, 'Internal Server Error', 'Opps ocurrio un problema en con <b>controlador/acción</b>');
  }
}else{
  showErrorHtml('views/errors/general.php', 500, 'Internal Server Error', 'No se encontro el controlador');
  
}
