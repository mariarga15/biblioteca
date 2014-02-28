<?php 
	session_start();
	if(isset($_SESSION["acceso"]))
	{
		if(!$_SESSION["acceso"])
		{
			header ("Location: ../index.php");
		}
	}
?>