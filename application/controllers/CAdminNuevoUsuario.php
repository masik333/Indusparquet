<?php

    class CAdminNuevoUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminNuevoUsuario");
    	  }
    	  function index() {
    	  	  $this->load->view("VAdminNuevoUsuario");
    	  }
    	  function registrarUsuario() {
    	  	  $errores = array();
    	  	  $nombre = $this->input->post("nombre");
    	  	  $apellido = $this->input->post("apellido");
    	  	  $email = $this->input->post("email");
    	  	  $clave = $this->input->post("clave");
    	  	  $claveEncriptada = sha1($clave);
    	  	  $rol = 1;
    	  	  $pattern = "/^[A-Z-_]+\d?/i";
    	  	  $emailRepetido = $this->MAdminNuevoUsuario->verificarEmail($email);

    	  	  $mensaje = "";

    	  	  if ($nombre == "") {
    	  	  	  $errores[] = "Se debe ingresar el nombre del usuario";
    	  	  }

    	  	  if (strlen($nombre) > 20) {
    	  	  	  $errores[] = "El nombre del usuario no puede contener más de 20 caracteres";
    	  	  }

              if ($nombre && !preg_match($pattern, $nombre)) {
              	  $errores[] = "El nombre del usuario debe contener únicamente letras";
              }

              if ($apellido == "") {
    	  	  	  $errores[] = "Se debe ingresar el apellido del usuario";
    	  	  }

    	  	  if (strlen($apellido) > 20) {
    	  	  	  $errores[] = "El apellido del usuario no puede contener más de 20 caracteres";
    	  	  }

              if ($apellido && !preg_match($pattern, $apellido)) {
              	  $errores[] = "El apellido del usuario debe contener únicamente letras";
              } 

              if ($email == "") {
              	   $errores[] = "Se debe ingresar el e-mail del usuario";
              }

              if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errores[] = "El e-mail introducido es inválido";
              }

               if (strlen($email) > 50) {
              	   $errores[] = "El e-mail no puede contener más de 50 caracteres";
               }

               if ($emailRepetido == true) {
              	   $errores[] = "El e-mail ya se encuentra en uso";
               }

               if ($clave == "") {
              	   $errores[] = "Se debe ingresar la clave del usuario";
               }

               if (sizeof($errores) == 0) {
              	   $param = array(
                      "nombre" => $nombre,
                      "apellido" => $apellido,
                      "email" => $email,
				      "clave" => $claveEncriptada,
				      "rol" => $rol
			       ); 

			       $this->MAdminNuevoUsuario->registrarUsuario($param);
			       $mensaje = "El usuario ha sido registrado con éxito";
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