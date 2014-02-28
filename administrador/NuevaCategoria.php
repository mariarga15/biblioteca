<?php 
  require_once('verificar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.css">  
    <script src="../js/jquery.js" type="text/javascript"></script>   
    <script src="../js/bootstrap.js" type="text/javascript"></script>   

    <link href="carousel.css" rel="stylesheet">
    <style id="holderjs-style" type="text/css"></style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
   <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Admintrador Biblioteca</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Añadir <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="NuevoAutor.php">Autor</a></li>
                    <li><a href="NuevaCategoria.php">Categoría</a></li>
                    <li><a href="NuevoLibro.php">Libro</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eliminar <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="EliminarAutor.php">Autor</a></li>
                    <li><a href="EliminarCategoria.php">Categoría</a></li>
                    <li><a href="EliminarLibro.php">Libro</a></li>
                  </ul>
                </li>
                <li><a href="cerrar.php">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="container" id="container">
      <h2>Nueva Categoría</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">Categoría</div>
          <div class="panel-body">
            <div class="alert alert-danger" id="msjError" style="display: none;"></div>
            <div class="alert alert-success" id ="msjOk" style="display: none;"></div>
            <form class="onclick" role="search" action="ListaLibros.php" method ="GET">
              <div class="col-md-8">
                <input type="text" id="nuevaCategoria" name="nuevaCategoria" class="form-control" >
              </div>              
              <input type="button" class="btn btn-default" onclick="NuevaCategoria()" value="Guardar" aria-hidden="true"/>                     
            </form>
            <div id='tabla'></div>            
          </div>          
        </div>                                
    </div> 

    <script>
      function NuevaCategoria()
      {   
        $.ajax({
          data:{nuevaCategoria:$('#nuevaCategoria').val()},
          url:'InstCategoria.php',
          type:'GET', 
          dataType: 'text json',         
          success:function(respuesta){ 
            if(respuesta['error'] == true)
            {
              $("#msjError").show();
              $("#msjOk").hide(); 
              $('#msjError').html(respuesta['descripcion']);
            } 
            else
            {   
              $("#msjOk").show(); 
              $("#msjError").hide();   
              $('#msjOk').html("La categoría se ha insertado con éxito");
              $('#nuevaCategoria').val('');
            }                                 
          }
        })
      }
      
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>

  </body>

  </html>