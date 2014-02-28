<?php 
	include '../configuracion/conexion.php';
	require_once('verificar.php');
	if(isset($_GET['categoria']))
	{		  
	   $error = False;
	   $error_mensaje = "";

       //echo $_GET['libro'];
       $datos = " Select IdCategoria from libro
                            where IdCategoria =" .$_GET['categoria'].""
                            ;       
        
        $filas = mysql_fetch_array(mysql_query($datos));

        if($filas['IdCategoria'])
        {
        	$error = TRUE;
	   		$error_mensaje = "Existe un libro, asociado a esta categoría.";
        }
        else
        {

        	mysql_query("DELETE FROM categoria WHERE IdCategoria = ".$_GET['categoria']."") or die($error = TRUE); ;
         $error_mensaje = "Ha ocurrido un error, al eliminar la categoria";

        }
        

         $informacionLibro = array('error' => $error,
                                    'descripcion' => $error_mensaje);
	   //$detalleInsert = array('error' => $error,
    						  //'descripcion' => $error_mensaje,
                              //'id ' => $_GET['libro']);

	   echo json_encode($informacionLibro);
	}

?>