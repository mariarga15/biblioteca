<?php 
	include '../configuracion/conexion.php';
	require_once('verificar.php');
	if(isset($_GET['nuevaCategoria']))
	{		  

	$error = False;
	$error_mensaje = "";

    	if($_GET['nuevaCategoria'] == "")
    	{    
    		$error = TRUE;		
    		$error_mensaje = "La categoría se encuentra vacía";    		
    	}
    	else
    	{    		
    		mysql_query("INSERT INTO categoria(NombreCategoria) VALUES('".$_GET['nuevaCategoria']."')") or die($error = TRUE);   
    		$error_mensaje = "Ha ocurrido un error, al insertar la nueva categoría";	 		
    	}    	    	

    	$detalleInsert = array('error' => $error,
        						  'descripcion' => $error_mensaje);

    	echo json_encode($detalleInsert);
	}
?>