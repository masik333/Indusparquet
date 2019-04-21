<?php

    class CLogin extends CI_Controller {
    	  function __construct() {
              parent::__construct();
              $this->load->model("MLogin");
    	  }
    	  function index() {
    	  	  $this->load->view("VLogin");
    	  }
    	  function login() {
    	  	  $mensaje = "";
              $usuario = $this->input->post("email", FILTER_SANITIZE_STRING);
              $clave = $this->input->post("clave", FILTER_SANITIZE_STRING);
              $claveEncriptada = sha1($clave);
              $resultado = $this->MLogin->login($usuario, $claveEncriptada);

              if ($usuario == "") {
                  $mensaje = "Debe ingresar su e-mail";
              } else {
                  if ($clave == "") {
                      $mensaje = "Debe ingresar su clave";
                  } else {
                        if ($resultado != null) {
                           $id_usuario = $resultado->id;
                           $id_email = $resultado->email;
                           $_SESSION["id_admin"] = $id_usuario;
                           $mensaje = "Login Exitoso";    
                        } else {
                           $mensaje = "Datos incorrectos";
                    }
                }   
            }
            echo json_encode($mensaje); 
    	  }
    }

?>