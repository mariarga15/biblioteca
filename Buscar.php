<?php 
  include './configuracion/conexion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/bootstrap.css">  
    <script src="js/jquery.js" type="text/javascript"></script>   
    <script src="js/bootstrap.js" type="text/javascript"></script>   

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
              <a class="navbar-brand" href="#">Biblioteca Virtual</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li class="active"><a href="Buscar.php">Buscar</a></li>
                <li><a href="administrador/index.php">Administrador</a></li>                
              </ul>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <div class="container" id="container">
      <h2>Criterios de búsqueda</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">Buscar</div>
          <div class="panel-body">
            <form class="onclick" role="search" action="ListaLibros.php" method ="GET">
              <div class="col-md-8">
                <input type="text" id="txtBuscar" name="txtBuscar" class="form-control" placeholder="Buscar por Categoría, Autor o Nombre Libro">
              </div>              
              <input type="button" class="btn btn-default" onclick="EnvioLibro()" value="Aceptar"/>                     
            </form>
            <div id='tabla'></div>            
          </div>          
        </div>                                
    </div>       

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="title" class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <div id='tabla'>                
                  <table>
                    <tr>
                      <td rowspan="6" id ="Imagen" class="thumbnail"></td>               
                      <td><br></td>                                                           
                    </tr>
                    <tr>
                      <td><h4>Descripción:</h4><p id="Descripcion"></p></td>
                    </tr>                   
                    <tr>                                            
                      <td><h4>Autor:</h4><p id="Autor"></p></td>
                    </tr>
                    <tr>                                            
                      <td><h4>Categoría:</h4><p id="Categoria"></p></td>                      
                    </tr>                   
                  </table>
                </div>
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script>
      function EnvioLibro()
      {        
        $.ajax({
          data:{txtBuscar:$('#txtBuscar').val()},
          url:'ListaLibros.php',
          type:'GET',          
          success:function(respuesta){  
            $('#tabla').html(respuesta);
          }
        })
      }

      function EnvioId(idLibro)
        {      
            $.ajax({
              data:{idLibro:idLibro},
              url:'DetalleLibro.php',
              type:'GET',  
              dataType: 'text json',
              success:function(respuesta){  
                $('#title').html(respuesta['titulo']);
                $('#Descripcion').html(respuesta['descripcion']);
                $('#Autor').html(respuesta['autor']);
                $('#Categoria').html(respuesta['categoria']);
                $('#Imagen').html('<img src="images/' + respuesta['imagen'] + ' " WIDTH=100px HEIGHT=120px />');
                //$( "#Imagen" ).html();
                // '<img src="' + imageData + '" />'
              }
            });
        }
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>