<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>


<?php

include ("conexionbd.php");

$conexion =$base->query("SELECT * FROM tareas");


if(!isset($_POST["bot_actualizar"])){

$idtarea = $_GET["id"];
$nombretarea = $_GET["nombre"];
$estadotarea = $_GET["estado"];

}  else {

$idtareapost = $_POST["id"];
$nombretareapost = $_POST["nombre"];
$estadotareapost = $_POST["estado"];


$sql="UPDATE tareas SET NOMBRE=?, ESTADO= ? WHERE (ID= ?);";  
$resultado = $base->prepare($sql);

$resultado->execute([$nombretareapost,$estadotareapost,$idtareapost]); 

header("location:index.php");

}

?>

<form action="" method="post" name="form1">
  <table width="25%" border="1" >
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id"  value="<?php echo $idtarea?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $nombretarea?>"></td>
    </tr>
    <tr>
      <td>estado</td>
      <td><label for="estado"></label>
      <input type="text" name="estado" id="estado" value="<?php echo $estadotarea?>"></td>
    </tr>
    
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>