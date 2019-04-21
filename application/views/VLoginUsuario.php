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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin-custom.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
               <!-- Migas -->
          <div class="migas">
            <nav>
              <div class="container">
                <div class="col s12">
                  <a href="<?php echo base_url(); ?>CIndex" class="breadcrumb">INICIO</a>
                  <a href="#" class="breadcrumb">INICIAR SESIÓN</a>
                </div>
              </div>
            </nav>
          </div>
      <!-- Secciones -->
                 
          <div class="container card-estatica ">
            <div class="card">
            <div class="row">
              <h4>INICIAR SESIÓN</h4>
              <div class="col m6">
                
             <form id="formulario-login" method="POST" class="col m12" style="border-right:1px solid #ddd;">
                   
                        <div class="input-field col s12 m12">
                          <input id="email" name="email" type="email" class="validate">
                          <label for="email">Usuario</label>
                        </div>
                        <div class="input-field col s12 m12">
                          <input id="password" name="clave" type="password" class="validate">
                          <label for="password">Contraseña</label>
                        </div>
                      
                        <div class="row">
                            <div class="col s12 m3 left-align">
                          <a href="<?php echo base_url(); ?>CRegistroUsuario">Registrarme</a>

                      </div>
                        <div class="col s12 m9 right-align">
                           <a href="#">Olvidé mi contraseña </a> <button type="submit" class="btn-green" id="btn-login">INICIAR SESIÓN</button>
                      </div>
                    
                      </div>  
                    </form>
                   
                  </div>    
                <div class="col m6">

                <ul class="lsn"> 
                  <li><a href="<?php echo $loginURL; ?>"><span><i class="fab fa-google"></i></span> Acceder con Google</a></li>
                  <li><a href="<?php echo $this->facebook->login_url(); ?>" id="fb"><span><i class="fab fa-facebook"></i></span> Acceder con Facebook</a></li>
                </ul>
              </div>
                          
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