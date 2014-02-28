<?php 
include './configuracion/conexion.php';
	if(isset($_GET['txtBuscar']))
	{		
		$buscar = $_GET['txtBuscar'];

		$consulta = "
					SELECT * 
					FROM libro, autor, categoria
					WHERE 
					libro.IdAutor = autor.IdAutor
					AND libro.IdCategoria = categoria.IdCategoria
							
					AND (libro.Titulo LIKE  '%".$buscar."%'
					OR autor.NombreAutor LIKE  '%".$buscar."%'
					OR categoria.NombreCategoria LIKE '%".$buscar."%')
		";	

		$resultado = mysql_query($consulta);
		$arrayLibro = array();	

		echo  "<table class='table table-striped'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>Titulo</th>";
					echo "<th>Autor</th>";
					echo "<th>Categoría</th>";
					echo "<th>+ info</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

		while ($row = mysql_fetch_array($resultado))
		{			
				echo "<tr>";					
					echo "<td>".$row['Titulo']."</td>";
					echo "<td>".$row['NombreAutor']."</td>";
					echo "<td>".$row['NombreCategoria']."</td>";
					//echo "<td><a href='DetalleLibro.php?id=".$row['IdLibro']."'>Detalle</a></td>";					
					echo '<td><a href="#" onclick="javascript:EnvioId('.$row['IdLibro'].')" data-target="#myModal" data-toggle="modal" >Detalle</a></td>'; 
				echo "</tr>";
		}

			echo "<tbody>";
		echo "</table>";
		//echo json_encode($md_array["1"]);		
	}
	
	//echo "<div class='popover fade right in' style='display: block; top: 24px; left: 232px;'><div class='arrow'></div><h3 class='popover-title'>A Title</h3><div class='popover-content'>And heres some amazing content. Its very engaging. right?</div></div>";	

?>