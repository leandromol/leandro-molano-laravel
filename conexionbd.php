<?php


try {
    $base = new PDO ('mysql:host = localhost; dbname=tareasdeldia' , 'root', '');

    
    $base->exec("SET CHARACTER SET UTF8");

} catch (\Exception $e) {

       die ('error'. $e->getMessage());

       echo "linea del error". $e->getLine();
}

?>