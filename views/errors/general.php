<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title><?php echo isset($titulo___)?$titulo___:null ?></title>
<style>
*{
  margin: 0px;
  padding: 0px;
  font-family: Helvetica, Arial, sans-serif;
}
body{
  background-color: #fff;
}
.contenedor{
  padding: 50px
}
h2{
  padding-bottom: 10px
}
</style>
</head>
<body>
<div class="contenedor">
<h2><?php echo isset($titulo___)?$titulo___:null ?></h2>
<div class="error">
<?php echo isset($err___)?$err___:null ?>
</div>
</div>
</body>
</html>
