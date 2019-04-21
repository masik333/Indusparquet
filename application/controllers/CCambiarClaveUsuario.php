<?php
 
    class CCambiarClaveUsuario extends CI_Controller { 
          function __construct() {
          	  parent::__construct();
          	  $this->load->model("MCambiarClaveUsuario");

          	  if (!isset($_SESSION["id_usuario"])) {
                  redirect(base_url() . 'CLoginUsuario', 'refresh');
                  die();
              }
          }
          function index() {
          	  $this->load->view("VCambiarClaveUsuario");
          }
          function cambiarClave() {
          	  $id = $_SESSION["id_usuario"];

          	  $errores = array();
    	  	  $claveActual = $this->input->post("claveActual");
              $claveActualEncriptada = sha1($claveActual);
    	  	  $claveNueva = $this->input->post("claveNueva");
              $claveNuevaEncriptada = sha1($claveNueva);
              $verificarClaveActual = $this->MCambiarClaveUsuario->verificarClaveActual($id, $claveActualEncriptada);

    	  	  $mensaje = "";

              if ($verificarClaveActual == false) {
                  $errores[] = "La clave actual es inválida";
              }

    	  	  if ($claveActual == "") {
                  $errores[] = "Debe ingresar su clave";
              }

              if ($claveNueva == "") {
                  $errores[] = "Debe ingresar su clave nueva";
              }

              if (sizeof($errores) == 0) {
              	  $param = array(      
                     "clave" => $claveNuevaEncriptada
			      ); 

			      $this->MCambiarClaveUsuario->cambiarClave($id, $param);
			      $mensaje = "La clave del usuario ha sido modificada con éxito";
              }

              if (sizeof($errores) > 0) {
                  foreach ($errores as $error) {
           	         $mensaje = $error;
		          }     
		      }

		      echo json_encode($mensaje);
          }
    }

?>