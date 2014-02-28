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
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="Buscar.php">Buscar</a></li>
                <li><a href="administrador/index.php">Administrador</a></li>           
              </ul>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <div class="container">
      <div class ="jumbotron">
        <h1>Bienvenidos</h1>
        <p>Donde pódes encontrar la mayor cantidad de libros del mercado. Para todos los gustos.</p>
        <p>Hechale un vistazo...</p>
      </div>  
      <div class="row">        
        <?php 
          $sql = "SELECT RAND(3), Titulo, Descripcion, IdLibro
                  FROM libro
                  ORDER BY RAND()
                  LIMIT 3";
            
          $result = mysql_query($sql);            

          while ($row = mysql_fetch_array($result)){
                                          echo '<div class="col-sm-6 col-md-4">';
                                          echo '<div class="thumbnail">';                                          
                                          //echo '<img data-src="holder.js/300x200" alt="...">';
                                          echo '<div class="caption">';
                                          echo '<h3>'.$row['Titulo'].'</h3>';
                                          echo '<p>'.$row['Descripcion'].'</p>';
                                          //echo '<a class="btn btn-primary href="#" role="button">Ver detalles </a>';
                                          echo '</div>';
                                          echo '</div>';                                          
                                          echo '</div>';                                          
                                        }
        ?>          
      </div> 

    </div>       
  <div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>