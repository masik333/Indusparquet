 <!DOCTYPE html>
  <html>
    <head>
    	<meta charset="utf-8">
      <title>NOMBRE PRODUCTO | INDUSPARQUET</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import Flaticon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font/flaticon.css">

      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon-indusparquet.png">
      <!--Import FontAwesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/hover-min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <!-- Body -->

    <body>

    <div class="top">
        <div class="container">

          <div class="row">

            <div class="col s6 acceso">
              <a href="<?php echo base_url(); ?>CLogin" alt="Acceso" target="_blank"><span class="flaticon-block"></span></a>
            </div>

            <div class="col s6 social right-align">
                <a href="#"><span class="fab fa-facebook-f"></span></a>
                <a href="#"><span class="fab fa-twitter"></span></a>
                <a href="#"><span class="fab fa-instagram"></span></a>
                <a href="#"><span class="fab fa-pinterest"></span></a>
                <a href="#"><span class="fab fa-youtube"></span></a>
            </div>
          </div>

        </div>  
      </div>  

      <div class="container">

        <div class="col 12 sec-logo">
        <div class="row ">

          <div class="col s9">
              <img src="<?php echo base_url(); ?>assets/img/logo-indusparquet.png" alt="Indusparquet" class="responsive-img">
          </div>

          <div class="col s3 sec-user right-align">

              <a class="modal-trigger" href="#search"><span class="flaticon-search"></span></a>
              <a href="<?php echo base_url(); ?>CCarrito">
                <span class="flaticon-shopping-bag-1">
                    <?php if (isset($_SESSION["id_usuario"])) { 
                          if ($total == 0) { ?>
                          <span class="totalCarrito" value="<?php echo $total; ?>"></span>
                        <?php } else { ?>
                          <span class="totalCarrito" value="<?php echo $total; ?>"><?php echo $total; ?></span>
                        <?php } 
                        } ?>
                </span></a>
              <a href="<?php echo base_url(); ?>CPerfilUsuario"><span class="flaticon-avatar-inside-a-circle"></span></a>
          </div>

        </div>
        </div>
      </div>

      <!-- BUSCADOR -->
      <!-- Modal Structure -->
  <div id="search" class="modal">
    <form method="GET" action="<?php echo base_url(); ?>CDetalleProducto/filtrarProductos">
    
    <div class="modal-content">
      <div class="container">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="large material-icons">clear</i></a>

      <h4>BUSCAR</h4>
      <p>Ingrese el producto a buscar</p>
      <input type="text" name="busqueda">
        <div class="right-align btn-search">
          <a class="btn-green-search" type="submit" name="action">BUSCAR</a>
        </div> 
        </div>
    </div>

    </form>
       
  </div>

    <!-- Menu -->
      
    <div class="container-fluid">
             <nav>
    <div class="nav-wrapper">
      <div class="container">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="<?php echo base_url(); ?>CIndex">Home</a></li>
        <li><a href="<?php echo base_url(); ?>CNoticias">Noticias</a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Nosotros</a></li>
        <li><a href="<?php echo base_url(); ?>CProductos">Productos</a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Herramientas</a></li>
        <li><a href="mobile.html">Puntos de Venta</a></li>
        <li><a href="mobile.html">Contacto</a></li>
        <li><a href="mobile.html">Distribuidores</a></li>
      </ul>
      </div>
    </div>
  </nav>
 <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="<?php echo base_url(); ?>CIndustria">INDUSTRIA</a></li>
    <li><a href="#!">HISTORIA</a></li>
    <li><a href="#!">360</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="#!">MEDIOAMBIENTE</a></li>
 <li><a href="#!">RESPONSABILIDAD</a></li>
  </ul>

  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="#!">RECOMENDACIONES</a></li>
    <li><a href="#!">MANTENIMIENTO</a></li>
    <li><a href="#!">PREGUNTAS FRECUENTES</a></li>
     <li><a href="#!">GARANTÍA INDUSPARQUET</a></li>
    <li><a href="#!">INST. PISOS DE MADERA</a></li>
    <li><a href="#!">MARKETING</a></li>

  </ul>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="badges.html">Noticias</a></li>
    <li class="divider"></li>
    <li><a href="collapsible.html">Nosotros</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Productos</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Medioambiente</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Herramientas</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Puntos de Venta</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Contacto</a></li>
    <li class="divider"></li>
    <li><a href="mobile.html">Red de Distribuidores</a></li>
  </ul>

    </div>
      <!-- Fin Menu -->

      <!-- Migas -->
          <div class="migas">
            <nav>
              <div class="container">
                <div class="col s12">
                  <a href="<?php echo base_url(); ?>CIndex" class="breadcrumb">INICIO</a>
                  <a href="<?php echo base_url(); ?>CProductos" class="breadcrumb">PRODUCTO</a>
                  <a href="#!" class="breadcrumb">CATEGORIA</a>
                  <a href="#!" class="breadcrumb">NOMBRE PRODUCTO</a>
                </div>
              </div>
            </nav>
          </div>
      <!-- Secciones -->


      <div class="container">
          <div class="card">

              <div class="row">

                  <form method="POST" action="<?php echo base_url(); ?>CDetalleProducto/guardarEnCarrito/?id=<?php echo $resultado->id; ?>" class="formulario-carrito">

                    <div class="col m5 center-align">
                      <div class="product--image">
                         <img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $resultado->imagenPrincipal; ?>" class="display-img">
                       <div class="icon-images">
                          <?php foreach ($resultadoImagenes as $rowImagenes) { ?>
                            <img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $rowImagenes->imagen; ?>">
                          <?php } ?>
                        </div>
                      </div>
                    </div>

                      <div class="col m7 detalle">
                        <h4><?php echo $resultado->nombre; ?></h4>
                        <h5>$<?php echo $resultado->precioFijo; ?></h5>
                        <div class="col s12 quantity">
                          <input type="number" name="cantidad" min="1" step="1" value="1">
                        </div>
                        <div class="descripcion-prod">
                          <span>DESCRIPCIÓN</span>
                          <p><?php echo $resultado->descripcion; ?></p>
                        </div>

                        <div class="envio">
                             <ul class="collapsible">
                              <li>
                                <div class="collapsible-header">FORMAS DE ENVÍO<i class="material-icons">add</i></div>
                                <div class="collapsible-body"><ul><li>Retiro en Sucursal.</li><li>Expreso.</li></ul></div>
                              </li>
                             </ul>
                        </div>
                        <?php if (isset($_SESSION["id_usuario"])) { ?>
                        <a href="javascript:$('.formulario-carrito').submit()" class="btn-green">COMPRAR</a>
                        <?php } ?>
                        <a class="modal-trigger btn-invert" href="#consulta">CONSULTAR</a>

                          <div class="center-align pagos">
                            <img src="<?php echo base_url(); ?>assets/img/MercadoPago.png" alt="MercadoPago" class="responsive-img">
                         </div>

                    </div>
                  </form>
              </div>

          </div>
         
      </div>

      <div class="container interes">

        <div class="row">
            <div class="col m3">
                <h5>Tambíen te puede <br> interesar</h5>
                <div class="divider"></div>
            </div>

            <div class="col m9">

                 <!-- Producto -->

                 <?php foreach ($interesar as $rowInteresar) { ?>
                  <div class="hvr-bob col xs12 m6 l4">
                  <div class="card producto">
                      <p class="left-align">$<?php echo $rowInteresar->precioFijo; ?></p>
                    <a href="<?php echo base_url(); ?>CDetalleProducto/?id=<?php echo $rowInteresar->prod; ?>"><img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $rowInteresar->imagenPrincipal; ?>"></a>
                    <a href="<?php echo base_url(); ?>CDetalleProducto/?id=<?php echo $rowInteresar->prod; ?>"><h6><?php echo $rowInteresar->nombre; ?></h6></a>
                     <div class="categorias">
                      <a href="#"><div class="chip"><?php echo $rowInteresar->categoria; ?></div></a>
                      <?php if ($rowInteresar->subCategoria) { ?>
                          <a href="#"><div class="chip"><?php echo $rowInteresar->subCategoria; ?></div></a>
                      <?php } ?>
                     </div>
                  </div>
                  </div>

                  <?php } ?>
               
            <!-- Fin Producto -->

            </div>

        </div>  

      </div>

<!-- CONS MODAL-->
<div id="consulta" class="modal" style="margin-top:10%;opacity:0;">

    
    <div class="modal-content">
      <div class="container">
        <form method="POST" action="<?php echo base_url(); ?>CDetalleProducto/enviarConsulta" id="formulario-consulta">

      <h4 class="center-align">CONSULTA DE PRODUCTO</h4>
      <p class="center-align">Consulte por nuestros productos y un asesor se comunicará con usted.</p>
           <div class="row">
            <div class="col s6">
                <input type="text" name="nombre" placeholder="NOMBRE">
              </div>
              <div class="col s6">
                <input type="email" name="email" placeholder="EMAIL">
              </div>
           </div> 
               <div class="row">
            <div class="col s6">
                <input type="text" name="producto" placeholder="NOMBRE DEL PRODUCTO">
              </div>
              <div class="col s6">
                <input type="tel" name="telefono" placeholder="TELÉFONO (OPCIONAL)">
              </div>
           </div> 
            <div class="col s12">

              <textarea placeholder="ESCRIBA AQUÍ SU CONSULTA" name="mensaje"></textarea>

            </div>
        <div class=" right-align">
                        <button type="submit" class="btn-green">ENVIAR</button>
                       <a class="modal-close btn-invert" href="#!">VOLVER</a>
        </div> 
      </form>
        </div>
    </div>
       
  </div>
                      
 <footer>
                  <div class="container showrooms center-align">
                    <div class="divider" style="margin-bottom:20px;"></div>
                    <div class="row">
                        <div class="col s6 m2">
                          <p class="blue-indu">SHOWROOM CÓRDOBA</p>
                          <p class="show-desc">Rafael Núñez 4635, Local 3<br>
B° Cerro de las Rosas <br>Córdoba, Argentina <br>+54 (0351) 482 4814</p>

                        </div>
                         <div class="col s6 m3">
                          <p class="blue-indu">SHOWROOM BUENOS AIRES</p>
                          <p class="show-desc">Av. del Libertador 6366<br>B° Belgrano, Buenos Aires, Argentina <br>+54 (011) 4782 1566<br>Arenales 1150 - B° Recoleta, Argentina<br>+54 (011) 4811 8809</p>

                        </div>
                         <div class="col s6 m2">
                          <p class="blue-indu">SHOWROOM SALTA</p>
                          <p class="show-desc">Pueyrredon 1495<br>Salta, Argentina <br>+54 (387) 620 9998</p>

                        </div>
                         <div class="col s6 m3">
                          <p class="blue-indu">SHOWROOM TUCUMÁN</p>
                          <p class="show-desc">Av. Aconquija 285<br>Yerba Buena Tucumán, Argentina <br>+ 54 (381) 435 3772</p>

                        </div>
                          <div class="col s6 m2">
                          <p class="blue-indu">CASA CENTRAL</p>
                          <p class="show-desc">Juan B Justo 7932<br>Córdoba, Argentina <br>+54 (351) 499 4403</p>

                        </div>



                    </div>

                  </div>
<div class="divider"></div>
                  <div class="container footer">
                      <div class="row">
                        <div class="col m2">
                          <h6>MENU</h6>
                          <ul>
                            <li><a href="#">NOTICIAS</a></li>
                            <li><a href="#">NOSOTROS</a></li>
                            <li><a href="#">PRODUCTOS</a></li>
                            <li><a href="#">MEDIOAMBIENTE</a></li>
                            <li><a href="#">HERRAMIENTAS</a></li>
                            <li><a href="#">PUNTOS DE VENTA</a></li>
                            <li><a href="#">CONTACTO</a></li>
                          </ul>


                        </div>
                        <div class="col m2">
                          <h6>CATEGORÍAS</h6>
                          <ul>
                            <li><a href="#">PISOS</a></li>
                            <li><a href="#">DECK</a></li>
                            <li><a href="#">REVESTIMIENTOS</a></li>
                            <li><a href="#">OFERTAS</a></li>
                            <li><a href="#">OTROS</a></li>
                          </ul>


                        </div>

                        <div class="col m5 newsletter">
                          <h6>NEWSLETTER</h6>
                          <p>SUSCRITIBE Y RECIBÍ LAS ÚLTIMAS NOVEDADES</p>
                           <div class="input-field col s12">
                              <input id="email" type="email" class="validate">
                            </div>
                            <div class="right-align">
                            <a class="waves-effect waves-light btn-small"><i class="material-icons right">chevron_right</i>SUSCRIBIRME</a>
                            </div>
                        </div>

                        <div class="col m3 right-align">
                          <h6>INDUSPARQUET</h6>
                          <p>Indusparquet S.A. 2013 © Copyright 2012 
                            Todos los derechos reservados</p>   
                            <div class="right-align">
                              <img src="<?php echo base_url(); ?>assets/img/data.png">
                            </div>

                        </div>
                      </div>
                  </div>
             </footer>

     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

     <script> var base_url = "<?php echo base_url(); ?>" </script>
     
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/carrito.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones/consulta.js"></script>
      
      <!-- JS menu -->
      <script type="text/javascript">
      		$(document).ready(function(){
		    $('.sidenav').sidenav();
		  });
      </script>
      <!-- JS menu FIN-->

      <!-- JS Carousel -->
      <script type="text/javascript">

 $('.dropdown-trigger').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrain_width: true, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left' // Displays dropdown with edge aligned to the left of button
        });
      </script>

      <script type="text/javascript">
            $(document).ready(function(){
    $('.modal').modal();
  });

                      $(document).ready(function(){
    $('.consulta').modal();
  });

      </script>

      <!-- js filter -->
  <script type="text/javascript">
      $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  </script>
s
  <!-- js detalle-->
  <script type="text/javascript">
      // Change active class on product sizes.

        var sizes = jQuery(".product--size").find("span");
        sizes.click(function() {
          sizes.removeClass("active");
          $(this).addClass("active");
        });

        // Change image on thumbnail click.
        var thumbs = $(".icon-images").find("img");
        thumbs.click(function() {
          var src = $(this).attr("src");
          var dp = $(".display-img");
          dp.attr("src", src);
        });
  </script>
    </body>

    <!-- Fin Body -->
  </html>