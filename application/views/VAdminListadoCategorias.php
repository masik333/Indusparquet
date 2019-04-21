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
            <form method="GET" action="<?php echo base_url(); ?>CAdminListadoCategorias/filtrarCategorias" class="navbar-form">
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

      <div class="content">
         
  <div class="">
  <a href="<?php echo base_url(); ?>CAdminNuevaCategoria" class="btn btn-info">Nueva Categoria</a>
        </div>
        <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Listado de categorias</h4>
                  <p class="card-category"> Listado de categorias en el sistema.</p>
                </div>
                
          <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th class="mdl-data-table__cell--non-numeric">Categoria</th>                          
                            <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($resultado) && !isset($_POST["busqueda"])) { 
                                foreach ($resultado as $row) { ?>
                            <tr>                        
                            <td class="text-left"><?php echo $row->categoria; ?></td>                        
                            <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Agregar SubCategoria" class="btn btn-primary btn-link btn-sm">
                                      <a href="<?php echo base_url(); ?>CAdminListadoSubCategorias/?id=<?php echo $row->id; ?>"><i class="material-icons">playlist_add</i></a>
                                      </button>
                                      
                                      <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                                      <a href="#modal<?php echo $row->id; ?>" class="modal-trigger"><i class="material-icons">close</i></a>
                                      </button>
                            </td>
                            </tr>
                        
                        
                          <!-- Modal Structure -->
                        <div id="modal<?php echo $row->id; ?>" class="modal">
                            <div class="modal-content">
                                <h4>¿Eliminar la categoría <?php echo $row->categoria; ?>?</h4>                               
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close btn btn-succes">Cancelar</a>
                                <a href="<?php echo base_url(); ?>CAdminListadoCategorias/eliminarCategoria/?id=<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" class="modal-close btn btn-danger delete">Eliminar</a>
                            </div>
                        </div>
                        <?php } 
                          } else {
                             foreach ($resultadoCategorias as $rowCategoria) { ?>
                                <tr>                        
                            <td class="text-left"><?php echo $rowCategoria->categoria; ?></td>                        
                            <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Agregar SubCategoria" class="btn btn-primary btn-link btn-sm">
                                      <a href="<?php echo base_url(); ?>CAdminListadoSubCategorias/?id=<?php echo $rowCategoria->id; ?>"><i class="material-icons">playlist_add</i></a>
                                      </button>
                                      
                                      <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                                      <a href="#modal<?php echo $rowCategoria->id; ?>" class="modal-trigger"><i class="material-icons">close</i></a>
                                      </button>
                            </td>
                            </tr>
                        
                        
                          <!-- Modal Structure -->
                        <div id="modal<?php echo $rowCategoria->id; ?>" class="modal">
                            <div class="modal-content">
                                <h4>¿Eliminar la categoría <?php echo $rowCategoria->categoria; ?>?</h4>                         
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close btn btn-succes">Cancelar</a>
                                <a href="<?php echo base_url(); ?>CAdminListadoCategorias/eliminarCategoria/?id=<?php echo $rowCategoria->id; ?>" id="<?php echo $rowCategoria->id; ?>" class="modal-close btn btn-danger delete">Eliminar</a>
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
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/categorias.js"></script>

      <script type="text/javascript">
            $(document).ready(function(){
            $('.modal').modal();
            });
      </script>
</body>
</html>