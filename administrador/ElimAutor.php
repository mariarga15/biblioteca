<?php 
	include '../configuracion/conexion.php';
	require_once('verificar.php');
	if(isset($_GET['autor']))
	{		  
	   $error = False;
	   $error_mensaje = "";

       //echo $_GET['libro'];
       $datos = " Select IdAutor from libro
                            where IdAutor =" .$_GET['autor'].""
                            ;       
        
        $filas = mysql_fetch_array(mysql_query($datos));

        if($filas['IdAutor'])
        {
        	$error = TRUE;
	   		$error_mensaje = "Existe un libro, asociado a esta categoría.";
        }
        else
        {

            mysql_query("DELETE FROM autor WHERE IdAutor = ".$_GET['autor']."") or die($error = TRUE); ;
         $error_mensaje = "Ha ocurrido un error, al eliminar el autor";

        }
        

         $informacionLibro = array('error' => $error,
                                    'descripcion' => $error_mensaje);
	   //$detalleInsert = array('error' => $error,
    						  //'descripcion' => $error_mensaje,
                              //'id ' => $_GET['libro']);

	   echo json_encode($informacionLibro);
	}

?>