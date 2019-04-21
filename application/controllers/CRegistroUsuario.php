<?php

    class CRegistroUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MRegistroUsuario");
    	  }
    	  function index() {
    	  	  $this->load->view("VRegistroUsuario");
    	  }
    	  function registrarUsuario() {
    	  	  $errores = array();
    	  	  $nombre = $this->input->post("nombre");
    	  	  $telefono = $this->input->post("telefono");
    	  	  $email = $this->input->post("email");
    	  	  $clave = $this->input->post("clave");
    	  	  $claveEncriptada = sha1($clave);
    	  	  $pattern = "/^[A-Z-_]+\d?/i";
    	  	  $emailRepetido = $this->MRegistroUsuario->verificarEmail($email);

    	  	  $mensaje = "";

    	  	  if ($nombre == "") {
    	  	  	  $errores[] = "Se debe ingresar el nombre y apellido del usuario";
    	  	  }

    	  	  if (strlen($nombre) > 20) {
    	  	  	  $errores[] = "El nombre y apellido del usuario no puede contener más de 70 caracteres";
    	  	  }

    	  	  if (is_numeric($nombre)) {
    	  	  	  $errores[] = "El nombre y apellido del usuario debe contener solamente letras";
    	  	  }

              if ($nombre && !preg_match($pattern, $nombre)) {
              	  $errores[] = "El nombre y apellido del usuario debe contener únicamente letras";
              }

              if ($telefono == "") {
                  $errores[] = "Se debe ingresar el número telefónico del usuario"; 
              }

              if (!is_numeric($telefono)) {
                  $errores[] = "El número telefónico debe contener solamente números"; 
              }

              if (strlen($telefono) > 20) {
              	  $errores[] = "El número de teléfono no puede contener más de 20 números";
              }

              if ($email == "") {
              	  $errores[] = "Se debe ingresar el e-mail del usuario";
              }

              if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errores[] = "El e-mail introducido es inválido";
              }

              if (strlen($email) > 60) {
              	  $errores[] = "El e-mail no puede contener más de 60 caracteres";
              }

              if ($emailRepetido == true) {
              	  $errores[] = "El e-mail ya se encuentra en uso";
              }

              if ($clave == "") {
              	  $errores[] = "Se debe ingresar la clave del usuario";
              }

              if (sizeof($errores) == 0) {
              	  $param = array(
                     "oauth_provider" => "indusparquet",
                     "nombre" => $nombre,
                     "telefono" => $telefono,
                     "email" => $email,
				             "clave" => $claveEncriptada
			      ); 

			      $this->MRegistroUsuario->registrarUsuario($param);
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