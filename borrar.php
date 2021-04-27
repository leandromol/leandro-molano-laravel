<?php

include ("conexionbd.php");

  $id = $_GET['id'];

  $base ->query("DELETE FROM tareas WHERE ID = $id");


  header("location:index.php")

?>
