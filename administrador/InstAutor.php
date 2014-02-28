<?php 
	include '../configuracion/conexion.php';
	require_once('verificar.php');
	if(isset($_GET['nuevoAutor']))
	{		  

	$error = False;
	$error_mensaje = "";

    	if($_GET['nuevoAutor'] == "")
    	{    
    		$error = TRUE;		
    		$error_mensaje = "El nombre del autor se encuentra vacío";    		
    	}
    	else
    	{    		
    		mysql_query("INSERT INTO autor(NombreAutor) VALUES('".$_GET['nuevoAutor']."')") or die($error = TRUE);   
    		$error_mensaje = "Ha ocurrido un error, al insertar el nuevo autor";	 		
    	}    	    	

    	$detalleInsert = array('error' => $error,
        						  'descripcion' => $error_mensaje);

    	echo json_encode($detalleInsert);
	}
?>