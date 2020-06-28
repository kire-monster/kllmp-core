<?php

include(SYSPATH. 'helpers/conexion.php');

class Admin extends kllmp_controlador{
  function __construct(){
    session_start();
  }
  private function validaSesion(){
    if(!empty($_SESSION['usuario'])){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function index(){
    if(!self::validaSesion()){
      header('location: /index.php/login');
      exit();
    }

    $Con = new Conexion('MySQL');
    $sql = "SELECT md.idModulo, md.nombre, md.ruta, md.fechaLiberacion as fecha FROM kllmporg_workstation.accesos ac JOIN kllmporg_workstation.modulos md ON ac.idModulo = md.idModulo and md.estado='A' and ac.idUsuario={$_SESSION['usuario']['idUsuario']}";

    $datos['modulos'] = $Con->Exec($sql) or die($Con->Error);

    $this->vista('front/administrador/inicio', $datos);
  }


}
