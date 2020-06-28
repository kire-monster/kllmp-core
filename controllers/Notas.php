<?php

include(SYSPATH . 'helpers/conexion.php');
include(SYSPATH . 'helpers/clear_data.php');

class Notas extends kllmp_Controlador{
  private $Con;
  function __construct(){
    session_start();
    if(empty($_SESSION['usuario'])){
      die("Sin sesion");
      exit(1);
    }
    $this->Con = new Conexion('MySQL');
  }

  public function index(){
    $visible = (isset($_GET['v']) && $_GET['v']!='' )?
                  ($_GET['v']==0)?
                    ' AND n.visible='.$_GET['v']:
                    ' OR n.visible='.$_GET['v']:
                  null;

    $sql = "SELECT n.idNota, n.titulo, n.contenido, n.fechaActualizacion fecha, CONCAT(u.nombre, ' ', u.apaterno, ' ', u.amaterno) nombre FROM kllmporg_warehouses.notas n JOIN kllmporg_workstation.usuarios u ON n.autor=u.idUsuario {$visible} and n.estado='A' and n.autor={$_SESSION['usuario']['idUsuario']}  ";

    $datos['notas'] = $this->Con->Exec($sql)or die($this->Con->Error);

    $this->vista('front/notas/encabezado');
    $this->vista('front/notas/inicio', $datos);
    $this->vista('front/notas/piepagina');
  }

  public function nueva(){
    $datos['ruta'] = '/index.php/notas/save';
    $this->vista('front/notas/encabezado');
    $this->vista('front/notas/form_nota', $datos);
    $this->vista('front/notas/piepagina');
  }
  public function save(){
    if($_POST){
      $titulo = isset($_POST['titulo'])?clearData($_POST['titulo']):null;
      $contenido = isset($_POST['contenido'])?$_POST['contenido']:null;
      $contenido = str_replace("'", "\'", $contenido);
      $visible = isset($_POST['visible'])?$_POST['visible']:null;
      $fecha = date('Y-m-d H:i:s', time());

      $sql = "INSERT INTO kllmporg_warehouses.notas (titulo, contenido, fechaPublicacion, fechaActualizacion, estado, visible, autor) values('{$titulo}','{$contenido}', '{$fecha}','{$fecha}', 'A', $visible, {$_SESSION['usuario']['idUsuario']})";

      $this->Con->Exec($sql)or die($this->Con->Error);
      header('location: /index.php/notas');
    }

  }

  public function editar(){
    global $uri;
    if(count($uri)==4 && $uri[3]!='' && is_numeric($uri[3])){

      $valida = $this->Con->Exec("SELECT idNota from kllmporg_warehouses.notas where idNota={$uri[3]} and estado='A' and autor={$_SESSION['usuario']['idUsuario']}");

      $datos['ruta'] = "/index.php/error";
      if($valida->Fetch()){
        $datos['ruta'] = "/index.php/notas/update/{$uri[3]}";
      }

      $idNota = $uri[3];
      $sql = "SELECT n.idNota, n.titulo, n.contenido FROM kllmporg_warehouses.notas n WHERE n.idNota={$idNota} and n.autor={$_SESSION['usuario']['idUsuario']} and n.estado='A' ";

      $datos['nota'] = $this->Con->Exec($sql)or die($this->Con->Error);

      $this->vista('front/notas/encabezado');
      $this->vista('front/notas/form_nota', $datos);
      $this->vista('front/notas/piepagina');
    }else{
      header("HTTP/1.0 404 Not Found");
      http_response_code(404);
      die("Not Found");
      exit();
    }

  }

  public function update(){
    global $uri;
    if($_POST && count($uri)==4 && $uri[3]!='' && is_numeric($uri[3])){

      $titulo = isset($_POST['titulo'])?clearData($_POST['titulo']):null;
      $contenido = isset($_POST['contenido'])?$_POST['contenido']:null;
      $visible = isset($_POST['visible'])?$_POST['visible']:null;
      $contenido = str_replace("'", "\'", $contenido);
      $fecha = date('Y-m-d H:i:s', time());

      $sql = "UPDATE kllmporg_warehouses.notas set titulo='{$titulo}', contenido='{$contenido}', visible=$visible, fechaActualizacion='$fecha' where idNota={$uri[3]} and autor={$_SESSION['usuario']['idUsuario']}";

      $this->Con->Exec($sql)or die($this->Con->Error);
      header("location: /index.php/notas/editar/{$uri[3]}");

    }else{
      header("HTTP/1.0 404 Not Found");
      http_response_code(404);
      die("Not Found");
      exit();
    }
  }
}
