<!DOCTYPE html>
<html>
<head>
	<title>ADMINISTRADOR | INDUSPARQUET</title>
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
     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin-custom.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fileUpload.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          IndusParquet ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>CAdminListadoProductos">
              <i class="material-icons">dashboard</i>
              <p>Productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>CAdminListadoUsuarios">
              <i class="material-icons">person</i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>CAdminListadoShowrooms">
              <i class="material-icons">location_ons</i>
              <p>Showrooms</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>CAdminListadoNoticias">
              <i class="material-icons">library_books</i>
              <p>Noticias</p>
            </a>
          </li>
          <li class="nav-item bottom">
            <a class="nav-link" href="<?php echo base_url(); ?>CLogoutAdmin/logoutAdmin">
              <i class="material-icons">power_settings_new</i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>  
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!--<a class="navbar-brand" href="#">DASHBOARD</a>-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
    
      <div class="content">
          <div class="container">

    <form action="<?php echo base_url(); ?>CAdminNuevoProducto/registrarProducto" method="post" id="formulario-producto" class="col s5" enctype="multipart/form-data">
    <a href="<?php echo base_url(); ?>CAdminListadoProductos" class="btn btn-warning">Volver</a>
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Nuevo Producto</h4>
                  <p class="card-category"> Agregar nuevo producto al sistema. Complete todos los campos.</p>
                </div>
                
          <div class="card-body">
            <div class="col-3">
                  <label>Categoría</label>
            <select id="idCat" name="idCat" class="form-control">
                  <option value="0">Ninguno</option>
                  <?php foreach ($resultado as $row) { ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->categoria; ?></option>    
                  <?php } ?>    
            </select>  
            </div>
            <div class="col-3" >
                  <label>Sub-Categoría</label>
            <select name="subcategoria" id="subcategoria" class="form-control"></select>  
            </div>
            <div class="">
            	 <div class="col-8">
            <label>Nombre: </label>
            <input type="text" name="nombre" class="form-control"/>
            </div>
            	<div class="col-2">
	            <label>Precio Fijo:</label>
	            <input type="text" name="precioFijo" class="form-control"/>
	            </div>
	            <div class="col-2">
	            <label>Precio Variable:</label> <input type="text" name="precioVariable" class="form-control"/>
	            </div>
              <div class="col-2">
              <label>Stock:</label> <input type="number" name="stock" min="0" class="form-control"/>
              </div>
            </div>
            <div class="col-12 ">
            <label>Descripción:</label>
            <input type="text" name="descripcion" class="form-control"/> 
            </div>
            <div class="col-12 upload-img">
               <div class="row">
<div class="col-3 upload-wrap">
  <div class="uploadpreview 01">
  </div>
  <input id="01" name="file-1" type="file" accept="image/*" >
</div>


<div class="col-3 upload-wrap">
  <div class="uploadpreview 02"></div>
  <input id="02" name="file-2" type="file" accept="image/*">
</div>

<div class="col-3 upload-wrap">
  <div class="uploadpreview 03"></div>
  <input id="03" name="file-3" type="file" accept="image/*">
</div>

</div>
            </div>
            <div class="col-12 btn-sen text-right">
            <input type="submit" value="Agregar Producto" class="btn btn-success"/>
            </div>
      </div>
</div>
</form>
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
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/productos.js"></script>

      <script type="text/javascript">
            $(document).ready(function(){
            $('.modal').modal();
            });
      </script>
</body>
</html>