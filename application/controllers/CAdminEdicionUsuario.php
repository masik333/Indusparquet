<?php

    class CAdminEdicionUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminEdicionUsuario");
    	  }
    	  function index() {
    	  	  $id = $_GET["id"];
              $data["resultado"] = $this->MAdminEdicionUsuario->traerDatosUsuario($id);

              if ($data["resultado"]) {
    	  	      $this->load->view("VAdminEdicionUsuario", $data);
              } else {
                  redirect(base_url() . 'CAdminListadoUsuarios', 'refresh');
              }
    	  }
    	  function modificarUsuario($id) {
    	  	  $errores = array();
    	  	  $claveActual = $this->input->post("claveActual");
            $claveActualEncriptada = sha1($claveActual);
    	  	  $claveNueva = $this->input->post("claveNueva");
            $claveNuevaEncriptada = sha1($claveNueva);
            $verificarClaveActual = $this->MAdminEdicionUsuario->verificarClaveActual($id, $claveActualEncriptada);

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

			      $this->MAdminEdicionUsuario->modificarUsuario($id, $param);
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