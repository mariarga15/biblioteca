<?php 
    include '../configuracion/conexion.php';
    require_once('verificar.php');
    if(isset($_GET['libro']))
    {         
       $error = False;
       $error_mensaje = "";

       //echo $_GET['libro'];
       $datos = " Select IdImagen from libro
                            where IdLibro =" .$_GET['libro'].""
                            ;       
        
        $filas = mysql_fetch_array(mysql_query($datos));

        mysql_query("DELETE FROM imagen WHERE IdImagen = ".$filas['IdImagen']."") or die($error = TRUE); ;
         $error_mensaje = "Ha ocurrido un error, al eliminar la imagen";

        mysql_query("DELETE FROM libro WHERE IdLibro = ".$_GET['libro']."") or die($error = TRUE);
         $error_mensaje = "Ha ocurrido un error, al eliminar el libro";         
                    

         $informacionLibro = array('error' => $error,
                                    'descripcion' => $error_mensaje);
       //$detalleInsert = array('error' => $error,
                              //'descripcion' => $error_mensaje,
                              //'id ' => $_GET['libro']);

       echo json_encode($informacionLibro);
    }

?>