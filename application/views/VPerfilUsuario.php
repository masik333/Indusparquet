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
                  <a href="index.php" class="breadcrumb">INICIO</a>
                  <a href="#!" class="breadcrumb">REGISTRO DE USUARIO</a>
                </div>
              </div>
            </nav>
          </div>
      <!-- Secciones -->
           
          <div class="container card-estatica ">
            <div class="card">
            
              <h4>MI PERFIL</h4>
              <p>Usuario:
                <strong>
                  <?php if (isset($_SESSION["id_usuario"])) {
                            echo $_SESSION["email"]; 
                        } 
                  ?>     
                  
                </strong></p>
              <div class="col m12">
                <a href="<?php echo base_url(); ?>CCambiarClaveUsuario">Cambiar Contraseña</a> | <a href="<?php echo base_url(); ?>CLogoutUsuario/logout">Cerrar Sesión</a>

                <div>
                  <h5>Mis Compras</h5>
                  <div class="divider"></div>
                    <table>
                        <thead>
                          <tr>    
                             <th>PRODUCTO</th>
                             <th>CANTIDAD</th>
                             <th>MONTO</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>NOMBRE PRODUCTO <br><span>Categoria</span></td>
                            <td>130 m2</td>
                            <td>$1049</td>
                          </tr>
                          <tr>
                            <td>NOMBRE PRODUCTO <br><span>Categoria</span></td>
                            <td>130 m2</td>
                            <td>$1049</td>
                          </tr>  
                        </tbody>
                      </table>
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