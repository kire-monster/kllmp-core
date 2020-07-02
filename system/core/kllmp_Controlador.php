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

  protected function clearData($string)
  {
    $string = trim($string);

    $string = str_replace(
      array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
      array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
      $string
    );

    $string = str_replace(
      array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
      array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
      $string
    );

    $string = str_replace(
      array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
      array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
      $string
    );

    $string = str_replace(
      array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
      array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
      $string
    );

    $string = str_replace(
      array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
      array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
      $string
    );

    $string = str_replace(
      array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
      array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
      $string
    );

    $string = str_replace(
      array('<script>','</script>', '<?php', '<?=', '?>'),
      '',
      $string
    );

    $string = str_replace(
      array('"', "'", ),
      array('&#34;','&#39;'),
      $string
    );

    /*$string = str_replace(
      array("\\", "¨", "º", "-", "~",
           "#", "@", "|", "!", "\"",
           "·", "$", "%", "&", "/",
           "(", ")", "?", "'", "¡",
           "¿", "[", "^", "<code>", "]",
           "+", "}", "{", "¨", "´",
           ">", "<", ";", ",", ":",
           ".", " "),
      '',
      $string
    );*/

    return $string;
  }
}
