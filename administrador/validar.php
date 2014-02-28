<?php 
	session_start();
	include '../configuracion/conexion.php';

	if(isset($_GET['usuario']) and isset($_GET['contrasena']) )
	{
		$error = False;
		$error_mensaje = "";

		//echo $_GET['usuario'];
		//echo $_GET['contrasena'];
        $_SESSION["acceso"] = TRUE;
        
		 $datos = " Select NombreUsuario from usuario
                            where NombreUsuario ='".$_GET['usuario']."'"
                            ;  

         $filas = mysql_fetch_array(mysql_query($datos));

         if(!$filas['NombreUsuario'])
        {
        	$error = TRUE;
	   		$error_mensaje = "El usuario no existe.";

	   		$_SESSION["acceso"] = FALSE;
        }
        else
        {
        	$validacion = " Select Contrasena, IdUsuario from usuario
                            where NombreUsuario ='" .$filas['NombreUsuario']."'"
                            ;  

            $validar = mysql_fetch_array(mysql_query($validacion));

            if($_GET['contrasena'] == $validar['Contrasena'])
            {
            	$error = False;
				$error_mensaje = "Contraseña corrrecta";

				$_SESSION["id"] = $validar['IdUsuario'];
				$_SESSION["acceso"] = TRUE;
            }
            else
            {
            	$error = TRUE;
				$error_mensaje = "Contraseña incorrecta";
				$_SESSION["acceso"] = FALSE;
            }
        }
        $inicio = array('error' => $error,
                        'descripcion' => $error_mensaje);

        echo json_encode($inicio);
	}
?>