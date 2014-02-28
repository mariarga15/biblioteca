<?php 
	include '../configuracion/conexion.php';
	require_once('verificar.php');
	if(isset($_GET['titulo']))
	{		
		$error = False;
		$error_mensaje = "";

        $titulo = $_GET['titulo'];     
	    $categoria = $_GET['categoria'];
	    $autor = $_GET['autor'];
	    $img = $_GET['img'];
	    $descripcion =$_GET['descripcion'];

	    if($titulo == "")
	    {
	    	$error = TRUE;		
    		$error_mensaje = "El titulo del libro se encuentra vacío";   
	    }
	    elseif ($img == "") {
	    	$error = TRUE;		
    		$error_mensaje = "No ha seleccionado una imagen"; 
	    }
	    elseif ($descripcion == "") {
	    	$error = TRUE;		
    		$error_mensaje = "La descripción se encuentra vacía"; 
	    }
	    else
	    {
	    	mysql_query("INSERT INTO imagen(Ruta) VALUES('".$_GET['img']."')") or die($error = TRUE);   
    		$error_mensaje = "Ha ocurrido un error, al insertar la imagen";	
			
    		$idImage = mysql_insert_id();

    		mysql_query("INSERT INTO libro(Titulo, IdAutor, IdCategoria, Descripcion, IdImagen) VALUES('".$_GET['titulo']."',".$autor.",".$categoria.",'".$descripcion."',".$idImage.")") or die($error = TRUE);   
    		$error_mensaje = "Ha ocurrido un error, al insertar la imagen";	

	    }
      	
      	$detalleInsert = array('error' => $error,
        						  'descripcion' => $error_mensaje);

		echo json_encode($detalleInsert);
        
	}
?>