<?php

    class CDetalleProducto extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MDetalleProducto");

            $this->load->library("pagination");
            $this->load->helper('url');
    	  }
    	  function index() {
    	  	    $id = $_GET["id"];
              $idCat = $this->MDetalleProducto->traerIdCat($id);

              $data["resultado"] = $this->MDetalleProducto->traerDatosProducto($id);
              $data["resultadoImagenes"] = $this->MDetalleProducto->traerImagenes($id);
              $data["interesar"] = $this->MDetalleProducto->interesar($id, $idCat); 

              if (isset($_SESSION["id_usuario"])) {
                  $idCliente = $_SESSION["id_usuario"];
                  $data["total"] = $this->MDetalleProducto->totalCarrito($idCliente);
              } 

              if ($data["resultado"]) {
                  $this->load->view("VDetalleProducto", $data);
              } else {
                  redirect(base_url() . 'CIndex', 'refresh');
              }
    	  }

        function guardarEnCarrito() {

              if (!isset($_SESSION["id_usuario"])) {
                  redirect(base_url() . 'CLoginUsuario', 'refresh');
                  die();
              }

              $errores = array();    
              $idProd = $_GET["id"];
              $idCliente = $_SESSION["id_usuario"];
              $cantidad = $this->input->post("cantidad");
              $verificarProducto = $this->MDetalleProducto->verificarProducto($idProd);

              //Verificamos si ya existe el mismo producto en la bd
              $verificarCarrito = $this->MDetalleProducto->verificarCarrito($idProd, $idCliente);

              if ($cantidad <= 0) {
                  $errores[] = "La cantidad a comprar debe ser mayor a 0";
              }

              if ($verificarProducto == null) {
                  $errores[] = "El ID del producto es inválido";
              }

              if ($cantidad > $verificarProducto->stock) {
                  $errores[] = "Disculpe, solo disponemos de " . $verificarProducto->stock . " mts² de éste producto";
              }

              $mensaje = "";

              if (sizeof($errores) == 0) {
                  $params = array(
                     "idCliente" => $idCliente,
                     "idProducto" => $idProd,
                     "cantidadMetros" => $cantidad
                  );

                  if ($verificarCarrito == null) {
                      $this->MDetalleProducto->guardarEnCarrito($params); //si no existe el id del producto en el carrito lo insertamos

                      $stockOriginal = $verificarProducto->stock;
                      $stockTotal = (int)$stockOriginal - (int)$cantidad;
                      $this->MDetalleProducto->modificarStock($idProd, $stockTotal);
                      $mensaje = "El producto ha sido añadido a su carrito de compras";
                  } else {

                      $cantidadActual = $verificarCarrito->cantidadMetros;
                      $nuevaCantidad = $cantidadActual + $cantidad;

                      $params = array(
                         "idCliente" => $idCliente,
                         "idProducto" => $idProd,
                         "cantidadMetros" => $nuevaCantidad
                      );

                      $this->MDetalleProducto->actualizarCarrito($idProd, $idCliente, $params); //si existe el id del producto en el carrito actualizamos la cantidad
                      $mensaje = "La cantidad de unidades de su producto ha sido añadida a su carrito";
                  }

              } else {
                  foreach ($errores as $error) {
                      $mensaje = $error;
                  }
              }
              echo json_encode($mensaje);
          }

        function filtrarProductos() {
              $busqueda = $_GET["busqueda"];
              
              $config = array();
              $config["base_url"] = base_url() . "CProductos";
              $config["total_rows"] = $this->MDetalleProducto->get_count_filtro($busqueda);
              $config["per_page"] = 9;
              $config["uri_segment"] = 2;

              $this->pagination->initialize($config);

              $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

              $data["links"] = $this->pagination->create_links();

              $data["categorias"] = $this->MDetalleProducto->traerCategorias(); //traemos las categorías para mostrarlas en el collapsible

              //traemos todas las subcategorias por cada una de las categorias y las guardaremos en un array
              $subCats = array();
              foreach($data["categorias"] as $cat){
                $subCats[$cat->id] = $this->MDetalleProducto->getSubCat($cat->id);
              }

              //lo enviaremos a la vista //guardamos la variable
              $data['subCats'] = $subCats;

              if (isset($_SESSION["id_usuario"])) {
                  $idCliente = $_SESSION["id_usuario"];
                  $data["total"] = $this->MDetalleProducto->totalCarrito($idCliente);
              } 

              if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                  redirect(base_url() . 'CIndex', 'refresh');
              }
              $data["resultadoProductos"] = $this->MDetalleProducto->filtrarProductos($config["per_page"], $page, $busqueda);
              $this->load->view("VProductos", $data);
          }

          function enviarConsulta() {
              $errores = array();
              $nombre = $this->input->post("nombre");
              $email = $this->input->post("email");
              $producto = $this->input->post("producto");
              $telefono = $this->input->post("telefono");
              $mensaje = $this->input->post("mensaje");

              if ($nombre == "") {
                  $errores[] = "Debe ingresar su nombre";
              }

              if (is_numeric($nombre)) {
                  $errores[] = "El nombre no debe contener números"; 
              }

              if ($email == "") {
                  $errores[] = "Debe ingresar un e-mail";
              }

              if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errores[] = "El e-mail introducido es inválido";
              }

              if ($producto == "") {
                  $errores[] = "Debe ingresar el nombre del producto a consultar";
              }

              if ($telefono && !is_numeric($telefono)) {
                  $errores[] = "El teléfono debe contener únicamente números";
              }

              if ($mensaje == "") {
                  $errores[] = "Debe ingresar un mensaje";
              }

              $mensaje = "";

              if (sizeof($errores) == 0) {

                  //Cargamos la librería email
                  $this->load->library('email');
                  //Indicamos el protocolo a utilizar
                  $config['protocol'] = 'smtp';
         
                  //El servidor de correo que utilizaremos
                  $config["smtp_host"] = 'smtp.gmail.com';
         
                  //Nuestro usuario
                  $config["smtp_user"] = ''; //Acá va el e-mail del cliente
         
                  //Nuestra contraseña
                  $config["smtp_pass"] = ''; //Acá va la clave del e-mail del cliente
         
                  //El puerto que utilizará el servidor smtp
                  $config["smtp_port"] = 465;
        
                  //El juego de caracteres a utilizar
                  $config['charset'] = 'utf-8';
 
                  //Permitimos que se puedan cortar palabras
                  $config['wordwrap'] = TRUE;
         
                  //El email debe ser valido 
                  $config['validate'] = true;

                  $this->email->initialize($config);

                  $this->email->from('marinilucas500@gmail.com', 'Lucas Marini');

                  $this->email->to($email, $nombre);

                  $this->email->subject($mensaje);

                  $this->email->message(
                      "Email: " . $email .
                      "Mensaje: " . $mensaje
                  );

                  $this->email->set_newline("\r\n");

                  //Enviamos el email y si se produce bien o mal que avise con una flasdata
                  if ($this->email->send()) {
                      //$this->session->set_flashdata('envio', 'Email enviado correctamente');
                      $mensaje = "Su consulta se ha enviado exitosamente, muchas gracias!";
                  } else {
                      //$this->session->set_flashdata('envio', 'No se a enviado el email');
                      $mensaje = "Su consulta no ha podido enviarse, pruebe en otro momento";
                  }
              } else {
                  foreach ($errores as $error) {
                      $mensaje = $error;
                  }
              }

              echo json_encode($mensaje);
          }
    }

?>