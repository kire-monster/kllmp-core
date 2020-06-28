<?php

include(SYSPATH . 'helpers/clear_data.php');
include(SYSPATH . 'helpers/conexion.php');

class Login extends kllmp_Controlador{

  function __construct(){
    session_start();
  }

  public function index(){
    $this->vista('front/login/inicio');
  }

  public function out(){
    session_unset();
    session_destroy();
    header('location: /index.php/login');
  }

  public function val(){
    if($_POST){
      $usuario = isset($_POST['usr'])?clearData($_POST['usr']):null;
      $contrasenia = isset($_POST['pwd'])?md5(clearData($_POST['pwd'])):null;

      $Con = new Conexion('MySQL');
      $sql = "SELECT idUsuario, nombre, aPaterno, aMaterno from kllmporg_workstation.usuarios where email='{$usuario}' and contrasenia= '{$contrasenia}'";

      $usu = $Con->Exec($sql) or die($Con->Error);
      if($usu->Fetch()){
        $_SESSION['usuario'] = array(
          'idUsuario' => $usu->Registro[0],
          'nombre' => $usu->Registro[1],
          'apaterno' => $usu->Registro[2],
          'amaterno' => $usu->Registro[3],
        );

        header('location: /');
      }else{
        session_unset();
        session_destroy();
        header('location: /index.php/login');
      }
    }else{
      header("HTTP/1.0 404 Not Found");
      http_response_code(404);
      die("Not Found");
      exit();
    }
  }
}
