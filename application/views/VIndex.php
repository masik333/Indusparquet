<!DOCTYPE html>
  <html>
    <head>
    	<meta charset="utf-8">
      <title>INDUSPARQUET</title>
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
                        <?php } ?>
                    <?php } ?>
                </span></a>
              <a href="<?php echo base_url(); ?>CPerfilUsuario"><span class="flaticon-avatar-inside-a-circle"></span></a>
          </div>

        </div>
        </div>
      </div>

      <!-- BUSCADOR -->
      <!-- Modal Structure -->
  <div id="search" class="modal">
    <form method="GET" action="<?php echo base_url(); ?>CIndex/filtrarProductos">
    
    <div class="modal-content">
      <div class="container">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="large material-icons">clear</i></a>

      <h4>BUSCAR</h4>
      <p>Ingrese el producto a buscar</p>
      <input type="text" name="busqueda">
        <div class="right-align btn-search">
          <a class="btn-green-search" type="submit">BUSCAR</a>
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
    <li cl-ass="divider"></li>
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

      <!-- Slider -->

          <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect white grey-text darken-text-2">button</a>
    </div>
    <div class="carousel-item red white-text" href="#one!">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>

      <!-- FIn Slider -->

      <!-- Secciones -->

      <div class="container secciones">
        <div class="row">
          <div class="col s12 m4"><img src="<?php echo base_url(); ?>assets/img/upload-sale/1banner.jpg"  class="responsive-img"></div>
          <div class="col s12 m4"><img src="<?php echo base_url(); ?>assets/img/upload-sale/2banner.jpg"  class="responsive-img"></div>
          <div class="col s12 m4"><img src="<?php echo base_url(); ?>assets/img/upload-sale/3banner.jpg"  class="responsive-img"></div>

        </div>

      </div>

      <!-- Fin Secciones -->


      <!-- Banners-->

      <div class="container banners">
        <div class="row">
          <div class="col s12 m6"><img src="<?php echo base_url(); ?>assets/img/demo-img.jpg"  class="responsive-img"></div>
          <div class="col s12 m6"><img src="<?php echo base_url(); ?>assets/img/demo-img.jpg"  class="responsive-img"></div>

        </div>

      </div>

         <!-- Fin Banners-->

            <!-- Tendencia-->

            <div class="container">

                <div class="tendencia">
                  <h4 class="center-align">TENDENCIA</h4>
                <p class="center-align">LO MÁS VENDIDO</p>
                </div>
                
            </div>

            <!-- PRODUCTOS --> <!-- POR AHORA NO SE MOSTRARÁ NADA HASTA QUE NO ESTÉ MERCADOPAGO IMPLEMENTADO -->

           <!--<div class="container">
              <div class="row">-->
                <!-- Producto -->
                 
                  <!--<div class="hvr-bob col xs12 m6 l4"> 
                  <div class="card  producto">
                      <p class="left-align">$213</p>
                    <a href="<?php echo base_url(); ?>CDetalleProducto"><img src="<?php echo base_url(); ?>assets/img/demo-img.jpg"></a>
                    <a href="<?php echo base_url(); ?>CDetalleProducto"><h6>Nombre Producto</h6></a>
                    <?php if (isset($_SESSION["id_usuario"])) { ?>
                    <a href="#"><i class="car fas fa-shopping-cart"></i></a>
                    <?php } ?>
                     <div class="categorias">
                      <a href="#"><div class="chip">Cat. 1</div></a>
                      <a href="#"><div class="chip">Cat. 2</div></a>
                    
                  </div>
                    


                  </div>
                  </div>-->
               
            <!-- Fin Producto -->
              </div>

            </div>  

             <!--Fin Tendencia-->

             <!-- Formas de pago-->
             <div class="center-align">
             <img src="<?php echo base_url(); ?>assets/img/MercadoPago.png" alt="MercadoPago" class="responsive-img">
             </div>
             <div class="container divider"></div>

              <!-- Nuevo Ingreso-->

            <div class="container">

                <div class="tendencia">
                  <h4 class="center-align">NUEVO INGRESO</h4>
                <p class="center-align">NUEVOS PRODUCTOS</p>
                </div>
            </div>

            <!-- PRODUCTOS -->

            <div class="container">
              <div class="row">
                <!-- Producto -->
 
                  <?php $i = 1; foreach ($nuevoIngreso as $row) { ?>
                  <div class="hvr-bob col xs12 m6 l4">

                  <div class="card producto">
                      <p class="left-align">$<?php echo $row->precioFijo; ?></p>
                      <a href="<?php echo base_url(); ?>CDetalleProducto/?id=<?php echo $row->prod; ?>"><img src="<?php echo base_url(); ?>assets/img/productos/<?php echo $row->imagenPrincipal; ?>"></a>
                      <a href="<?php echo base_url(); ?>CDetalleProducto/?id=<?php echo $row->prod; ?>"><h6><?php echo $row->nombre; ?></h6></a>
                     <div class="categorias">
                      <a href="#"><div class="chip"><?php echo $row->categoria; ?></div></a>
                      <?php if ($row->subCategoria) { ?>
                         <a href="#"><div class="chip"><?php echo $row->subCategoria; ?></div></a>
                      <?php } ?>
                     </div>

                  </div>
                  </div>
                  <?php } ?>
               
            <!-- Fin Producto -->
              </div>

            </div>  

             <!--Fin NUEVO INGRESO-->

         
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
      
      <!-- JS menu -->
      <script type="text/javascript">
      		$(document).ready(function(){
		    $('.sidenav').sidenav();
		  });
      </script>
      <!-- JS menu FIN-->

      <!-- JS Carousel -->
      <script type="text/javascript">
            $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
      });
            autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 5000);
}

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

      </script>
    </body>

    <!-- Fin Body -->
  </html>