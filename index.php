<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">



</head>

<body>

  <?php

  include("conexionbd.php");


  $conexion = $base->query("SELECT * FROM tareas");   // realizamos la consulta  inciial

  $tareas =  $conexion->fetchAll(PDO::FETCH_OBJ);   // aqui almaceno el array de las tareas para iterarlo mas adelante 


  if (isset($_POST["crear"])) {

    $nombreNuevaTarea = $_POST["nombre"];
    $estadoNuevaTarea = $_POST["estado"];

    $sql = "INSERT INTO tareas (NOMBRE, ESTADO) VALUES (?,?)";

    $resultado = $base->prepare($sql);

    $resultado->execute($nombreNuevaTarea, $estadoNuevaTarea);

    header("location:index.php");
  }

  ?>

  <h1>CRUD</h1>

  <form action="index.php" method="$_POST">

    <table width="50%" border="1">
      <tr>
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Estado</td>

        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr>


      <?php

      foreach ($tareas as $tarea) : ?>


        <tr>
          <td> <?php echo "$tarea->ID" ?> </td>
          <td> <?php echo "$tarea->NOMBRE" ?> </td>
          <td> <?php echo "$tarea->ESTADO " ?> </td>

          <td class="bot"><a href="borrar.php?id=<?php echo $tarea->ID ?>"><input type='button' name='del' id='del' value='Borrar'></td>

          <td class='bot'>
            <a href="editar.php?id=<?php echo $tarea->ID ?> & nombre=<?php echo $tarea->NOMBRE ?>& estado=<?php echo $tarea->ESTADO ?>"><input type='button' name='up' id='up' value='Actualizar'>
          </td>

        </tr>


      <?php
      endforeach;
      ?>


      <td><input type='text' name="id" size='10' class='centrado'></td>
      <td><input type='text' name="nombre" id="nombre" size='10' class='centrado'></td>
      <td><input type='text' name="estado" id="estado" size='10' class='centrado'></td>
      <td class='bot'><input type="submit" name="crear" id="crear" value="insertar"></td>
      </tr>

  </form>

  </table>

</body>

</html>