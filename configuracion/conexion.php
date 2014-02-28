<?php
    $conecxion= mysql_connect("localhost","root","")
        or die ("No se encontro el servidor");
    mysql_select_db("biblioteca",$conecxion)
        or die ("No se pudo seleccionar la base de datos");
    
    mysql_query("SET NAMES 'utf8'");
?>
