<?php 
include './configuracion/conexion.php';
	if(isset($_GET['idLibro'])){
		$idLibro = $_GET['idLibro'];
		
		$detalleLibro = " Select libro.Titulo
		 					   , libro.Descripcion
		 					   , libro.IdImagen
		 					   , autor.NombreAutor
		 					   , categoria.NombreCategoria
		 					   , imagen.Ruta
		 					   , imagen.IdImagen
							from libro, categoria, autor, imagen
							where IdLibro =" .$idLibro."
							AND libro.IdAutor = autor.IdAutor
							AND libro.IdCategoria = categoria.IdCategoria
							AND libro.IdImagen = imagen.IdImagen"
							;       

        $datos = mysql_fetch_array(mysql_query($detalleLibro));		

        $informacionLibro = array('titulo' => $datos['Titulo'],
        						  'descripcion' => $datos['Descripcion'], 
        						  'autor' => $datos['NombreAutor'],
        						  'categoria' => $datos['NombreCategoria'],
        						  'imagen' => $datos['Ruta']);

        echo json_encode($informacionLibro);
	}
?>
