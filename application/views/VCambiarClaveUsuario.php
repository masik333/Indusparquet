<!DOCTYPE html>
<html>
<head>
	
	<title>Home | INDUSPARQUET</title>

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import Flaticon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font/flaticon.css">
    <!--Import FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/hover-min.css">
     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
               <!-- Migas -->
          <div class="migas">
            <nav>
              <div class="container">
                <div class="col s12">
                  <a href="<?php echo base_url(); ?>CIndex" class="breadcrumb">INICIO</a>
                  <a href="#" class="breadcrumb">REGISTRO DE USUARIO</a>
                </div>
              </div>
            </nav>
          </div>
      <!-- Secciones -->
       
          <div class="container card-estatica ">
            <div class="card">
            
              <h4>CAMBIAR CLAVE</h4>
              <div class="col m12">
                
             <form class="col m12" method="POST" action="<?php echo base_url(); ?>CCambiarClaveUsuario/cambiarClave" id="formulario-clave">

                         <div class="input-field col s12 m12">
                          <input id="claveActual" name="claveActual" type="password">
                          <label for="claveActual">Clave Actual</label>
                        </div>
                        <div class="input-field col s12 m12">
                          <input id="claveNueva" name="claveNueva" type="password">
                          <label for="claveNueva">Clave Nueva</label>
                        </div>
                        
                        <div class="right-align">
                         <button type="submit" class="btn-green">Cambiar clave</button>
                      </div>  
                    </form>     
                  </div>    
            </div>  
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

      <script> var base_url = "<?php echo base_url(); ?>" </script>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modal.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin-script.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileUpload.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/clientes.js"></script>

      <script type="text/javascript">
            $(document).ready(function(){
            $('.modal').modal();
            });
      </script>
</body>
</html>