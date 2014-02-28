<?php 
  include '../configuracion/conexion.php';
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
              <a class="navbar-brand" href="#">Administrador Biblioteca</a>
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
      <h2>Nuevo Libro</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">Libro</div>
        <div class="panel-body">
          <div class="alert alert-danger" id="msjError" style="display: none;"></div>
          <div class="alert alert-success" id ="msjOk" style="display: none;"></div>
          <div class="col-md-8"> 
            <form id="formlibro" class="form" role="search" method ="GET">
              <b>Título:</b>
              <br>
              <input type="text" id="titulo" name="titulo" class="form-control" >
              <br>
              <b>Categoría:</b>
              <br>
              <select name="select" id="categoria" name ="categoria">
                <?php 
                  $cursos = "SELECT * from categoria";

                  $result = mysql_query($cursos);

                  while ($row = mysql_fetch_array($result))
                  {                      
                    echo "<option value='".$row['IdCategoria']."'>".$row['NombreCategoria']."</option>";                      
                  }
                ?>
              </select>
              <br><br>
              <b>Autor:</b>   
              <br>           
              <select name="select" id="autor" name ="autor">
                <?php 
                  $cursos = "SELECT * from autor";

                  $result = mysql_query($cursos);

                  while ($row = mysql_fetch_array($result))
                  {                      
                    echo "<option value='".$row['IdAutor']."'>".$row['NombreAutor']."</option>";                      
                  }
                ?>
              </select>
              <br><br>
              <b>Descripción:</b>
              <br>
              <textarea rows="4" cols="50" id="descripcion"></textarea>
              <br><br>
              <b>Imagen:</b>
              <br>
              <input type="file" name="file_upload" id="file_upload" multiple>
              <br>
              <input class="btn btn-default"  type="submit" name="submit" value="Guardar" aria-hidden="true"/> 
            </form>
          </div> 
          <div id='tabla'></div>            
        </div>          
      </div>                                
    </div> 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $(function()
    {
            var files;
           
            $('input[type=file]').on('change', prepareUpload);
            $('#formlibro').on('submit', uploadFiles);

            
            function prepareUpload(event)
            {
                files = event.target.files;
            }
         
            function uploadFiles(event)
            {
                event.stopPropagation(); 
                event.preventDefault(); 

                        var data = new FormData();
                        $.each(files, function(key, value)
                        {
                                data.append(key, value);
                        });

                $.ajax({
                    url: 'submit.php?files',
                    type: 'POST',
                    data: data,
                    cache: false,
                    dataType: 'text json',
                    processData: false, 
                    contentType: false, 
                    success: function(data, textStatus, jqXHR)
                    {

                        if(typeof data.error === 'undefined')
                        {       
                            NuevoLibro(data['files']);
                        }
                        else
                        {

                                console.log('ERRORS: ' + data.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log('ERRORS: ' + textStatus);
                       
                    }
                });
        }

        function NuevoLibro(ruta)
      {  
        $.ajax({
          data:{titulo:$('#titulo').val(),categoria:$('#categoria').val(),autor:$('#autor').val(), img:ruta,descripcion:$('#descripcion').val()},
          url:'InstLibro.php',
          type:'GET',        
          dataType: 'text json',        
          success:function(respuesta){
            if(respuesta['error'] == true)
            {
              $("#msjError").show();
              $("#msjOk").hide(); 
              $('#msjError').html(respuesta['descripcion']);
              $('#nuevaCategoria').val('');
            } 
            else
            {  
              $("#msjOk").show(); 
              $("#msjError").hide();   
              $('#msjOk').html("El libro se ha insertado con éxito");
              $('#nuevaCategoria').val('');
              $('#titulo').val('');
              $('#descripcion').val('');
              $('#file_upload').val('');
              
            }                                    
          }
        })
      }

        function submitForm(event, data)
            {
              NuevoLibro();
                    
            }
    });
      
      
    </script>


    

  </body>
</html>

