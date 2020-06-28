<?php

class kllmp_Controlador
{
  protected function vista($pagina___='' , $data___ = array())
  {
    if(strpos($pagina___, '.php') === false){
      $pagina___ .= '.php';
    }

    if( is_file("views/$pagina___") ){
      if(!is_array($data___)){
        $titulo___ = 'Error 500';
        $err___ =  " <p>Tipo de variable no permitida en la funcion <b>vista(string _vista_, array _datos_)</b></p>";
        require_once('views/errors/general.php');
        die();
        exit(1);
      }
      extract($data___ , EXTR_SKIP);
      include("views/$pagina___");
    }else{
      $titulo___ = 'Error 404';
      $err___ =  "<p>no existe vista: <b>{$pagina___}</b></p>";
      require_once('views/errors/general.php');
      die();
      exit(1);
    }
  }
}
