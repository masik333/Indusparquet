<?php

    class CAdminNuevoShowroom extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminNuevoShowroom");
    	  }
    	  function index() {
    	  	  $this->load->view("VAdminNuevoShowroom");
    	  }
    	  function registrarShowroom() {
    	  	  $errores = array();
    	  	  $nombre = $this->input->post("nombre");
    	  	  $direccion = $this->input->post("direccion");
    	  	  $email = $this->input->post("email");
    	  	  $telefono = $this->input->post("telefono");
    	  	  $direccionRepetida = $this->MAdminNuevoShowroom->verificarShowroom($direccion);
    	  	  $pattern = "/^[A-Z-_]+\d?/i";

    	  	  $mensaje = "";

    	  	  if ($nombre == "") {
    	  	  	  $errores[] = "Se debe ingresar el nombre del showroom";
    	  	  }

    	  	  if (strlen($nombre) > 40) {
    	  	  	  $errores[] = "El nombre del showroom no puede contener más de 40 caracteres";
    	  	  }

              if ($direccion == "") {
    	  	  	  $errores[] = "Se debe ingresar la dirección del showroom";
    	  	  }

    	  	  if (strlen($direccion) > 200) {
    	  	  	  $errores[] = "La dirección del showroom no puede contener más de 200 caracteres";
    	  	  }

              if ($email == "") {
              	  $errores[] = "Se debe ingresar el e-mail del showroom";
              }

              if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errores[] = "El e-mail introducido es inválido";
              }

              if (strlen($email) > 60) {
              	  $errores[] = "El e-mail no puede contener más de 60 caracteres";
              }

              if ($direccionRepetida == true) {
              	  $errores[] = "Ya existe dicha showroom registrada";
              }

              if ($telefono == "") {
              	  $errores[] = "Se debe ingresar un número de teléfono";
              }

              if ($telefono && preg_match($pattern, $telefono)) {
              	  $errores[] = "El número de teléfono debe contener únicamente números";
              }

              if (sizeof($errores) == 0) {
              	  $param = array(
                     "nombre" => $nombre,
                     "direccion" => $direccion,
                     "email" => $email,
				             "telefono" => $telefono
			            ); 

			        $this->MAdminNuevoShowroom->registrarShowroom($param);
			        $mensaje = "El showroom ha sido registrado con éxito";
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