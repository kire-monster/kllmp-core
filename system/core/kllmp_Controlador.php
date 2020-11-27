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
        showErrorHtml('views/errors/general.php', 500, 'Internal Server Error', 'Tipo de variable no permitida en la funcion <b>vista(string _vista_, array _datos_)</b>');
      }
      extract($data___ , EXTR_SKIP);
      include("views/$pagina___");
    }else{
      showErrorHtml('views/errors/general.php', 404, 'Not Found', 'The requested URL was not found on this server.<br> Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.');
    }
  }
}
