<?php

//include(SYSPATH . 'helpers/clear_data.php');

class Home extends kllmp_Controlador {

  function __construct(){
    session_start();
  }

  public function index()  {
    $this->vista("home");
  }

}
