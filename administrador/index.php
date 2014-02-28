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
    <div class="row">
      <div class="col-md-4"></div>
        <div class="col-md-4">
          <form class="onclick"  role="form">
            <h2 class="form-signin-heading">Inicio de sesión</h2>
            <div class="col-sm-14">
              <div class="alert alert-danger" id="msjError" style="display: none;"></div>
              <div class="alert alert-success" id ="msjOk" style="display: none;"></div>
              <input type="text" id="usuario" class="form-control" placeholder="Usuario" required="" autofocus="">
              <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" required="">
              <br>
              <input type="button" class="btn btn-lg btn-primary btn-block" onclick="Ingresar()" value="Ingresar" aria-hidden="true"/> 
            </div>
          </form>
      </div>
    <div class="col-md-4"></div>
  </div> 


    <script>
      function Ingresar()
      {             
        $.ajax({
          data:{usuario:$('#usuario').val(), contrasena:$('#contrasena').val()},
          url:'validar.php',
          type:'GET',
          dataType: 'text json',          
          success:function(respuesta){ 
            if(respuesta['error'] == true)
            {
              $("#msjError").show();
              $("#msjOk").hide(); 
              $('#msjError').html(respuesta['descripcion']);
              $('#usuario').val('');
              $('#contrasena').val('');
            } 
            else
            {   
              $("#msjOk").show(); 
              $("#msjError").hide();     
              $('#msjOk').html("administrador");
              window.location="NuevoAutor.php";
              
              
            }                            
          }
        })
      }
      
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>