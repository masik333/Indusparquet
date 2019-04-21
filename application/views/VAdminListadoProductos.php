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
          <div class="collapse navbar-collapse justify-content-end">
            <form method="GET" action="<?php echo base_url(); ?>CAdminListadoProductos/filtrarProductos" class="navbar-form">
              <div class="input-group no-border">
                <input type="text" name="busqueda" autocomplete="off" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
         <div class="">
  <a href="<?php echo base_url(); ?>CAdminNuevoProducto" class="btn btn-info">Nuevo Producto</a> <a href="<?php echo base_url(); ?>CAdminListadoCategorias" class="btn btn-info">Categoría</a> | <label>Cotización u$s  </label><input type="number" value="" min="0" id="cotizador" name="cotizador" style="width:50px;margin-left:5px;"><button type="button" id="btn-cotizador" style="margin-left: 10px">Actualizar</button>
        </div>
		<div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Listado de Productos</h4>
                  <p class="card-category"> Listado de productos en el sistema.</p>
                </div>
                
          <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover tabla-productos">
                        <thead>
                            <tr>
                            <th class="mdl-data-table__cell--non-numeric">Producto</th>
                            <th class="text-center">Precio Fijo</th>
                            <th class="text-center">Precio Variable</th>
                            <th class="text-center">Stock Disponible</th>
                            <th></th>
                            <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          if (isset($resultado) && !isset($_POST["busqueda"])) {
                              foreach ($resultado as $row) { ?>
                        <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $row->nombre; ?></td>
                        <td class="text-center"><?php echo $row->precioFijo; ?></td>
                        <td class="text-center" class="precioVariable"><?php echo $row->precioVariable; ?></td>
                        <td class="text-center"><?php echo $row->stock; ?> Mts²</td>
                        <td class="text-center"><img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $row->imagenPrincipal; ?>" height="42" width="42"></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <a href="<?php echo base_url(); ?>CAdminEdicionProducto/?id=<?php echo $row->id; ?>"><i class="material-icons">edit</i></a>
                                  </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                   <a href="#modal<?php echo $row->id; ?>" class="modal-trigger"><i class="material-icons">close</i></a>
                            </button>
                        </td>
                        </tr>

                        <!--Modal Structure -->
                            <div id="modal<?php echo $row->id; ?>" class="modal">
                            <div class="modal-content">
                                <h4>¿Eliminar producto <?php echo $row->nombre; ?>?</h4>                               
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close btn btn-succes">Cancelar</a>
                                <a href="<?php echo base_url(); ?>CAdminListadoProductos/eliminarProducto/?id=<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" class="modal-close btn btn-danger delete">Eliminar</a>
                            </div>
                        </div>
                      <?php }
                       } else { 
                            foreach ($resultadoProductos as $rowProducto) { ?>
                               <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $rowProducto->nombre; ?></td>
                        <td class="text-center"><?php echo $rowProducto->precioFijo; ?></td>
                        <td class="text-center"><?php echo $rowProducto->precioVariable; ?></td>
                        <td class="text-center"><?php echo $rowProducto->stock; ?> Mts²</td>
                        <td class="text-center"><img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $rowProducto->imagenPrincipal; ?>" height="42" width="42"></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <a href="<?php echo base_url(); ?>CAdminEdicionProducto/?id=<?php echo $rowProducto->id; ?>"><i class="material-icons">edit</i></a>
                                  </button>
                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                   <a href="#modal<?php echo $rowProducto->id; ?>" class="modal-trigger"><i class="material-icons">close</i></a>
                            </button>
                        </td>
                        </tr>

                        <!--Modal Structure -->
                            <div id="modal<?php echo $rowProducto->id; ?>" class="modal">
                            <div class="modal-content">
                                <h4>¿Eliminar producto <?php echo $rowProducto->id; ?>?</h4>                               
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close btn btn-succes">Cancelar</a>
                                <a href="<?php echo base_url(); ?>CAdminListadoProductos/eliminarProducto/?id=<?php echo $rowProducto->id; ?>" id="<?php echo $rowProducto->id; ?>" class="modal-close btn btn-danger delete">Eliminar</a>
                            </div>
                        </div>
                            <?php }
                          } ?>
                        
                       
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
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/productos.js"></script>

      <script type="text/javascript">
            $(document).ready(function(){
            $('.modal').modal();
            });
      </script>

</body>
</html>