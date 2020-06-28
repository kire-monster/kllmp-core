<?php
/*
 * Limpia los caracteres
 */

function clearData($dato){
  $character = array(
    0 => array("`", "&#96"),
    1 => array('"', "&#34;"),
    2 => array('%', "&#37"),
    3 => array('<', '&lt;'),
    4 => array('>', '&gt;'),
    //5 => array("'", '&#8216;'),
    5 => array("'", "\'"),
    6 => array("\\", "\\"),
  );

  foreach ($character as $char) {
    str_replace($char[0], $char[1], $dato);
  }

  return $dato;
}
