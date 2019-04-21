<?php

    class CLoginUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MLoginUsuario");
    	  }
    	  function index() {   

            //Cargamos la librería de facebook para iniciar sesión
            $this->load->library("facebook");
            //Cargamos la librería de google para iniciar sesión
            $this->load->library("googleplus");
            $userData = array();

            if ($this->facebook->is_authenticated()) {
                $user = $this->facebook->request("get", "/me?fields=id,first_name, last_name, email");
                $userData['oauth_provider'] = 'facebook';
                $userData['oauth_uid']    = !empty($user['id'])?$user['id']:'';;
                $userData['nombre']    = !empty($user['first_name'])?$user['first_name']:'';
                $userData['email']        = !empty($user['email'])?$user['email']:'';

                $userID = $this->MLoginUsuario->checkUser($userData);
                
                if (!isset($user["error"])) {
                    $data["userData"] = $userData;
                    $_SESSION["id_usuario"] = $userID;
                    $_SESSION["email"] = $userData["email"];
                    $this->session->set_userdata('userData', $userData);
                }
                $this->load->view("VPerfilUsuario", $data);
            } else {

                if (isset($_GET['code'])) {
                    if ($this->googleplus->getAuthenticate()) {

                        $user = $this->googleplus->getUserInfo();
                
                        $userData['oauth_provider'] = 'google';
                        $userData['oauth_uid']      = $user['id'];
                        $userData['nombre']     = $user['given_name'];
                        $userData['email']          = $user['email'];

                        $userID = $this->MLoginUsuario->checkUser($userData);

                        if (!isset($user["error"])) {
                            $data["userData"] = $userData;
                            $_SESSION["id_usuario"] = $userID;
                            $_SESSION["email"] = $userData["email"];
                            $this->session->set_userdata('userData', $userData);
                        }

                        $this->load->view("VPerfilUsuario", $data);
                    }
                } else {
                    $data['loginURL'] = $this->googleplus->loginURL();
                    $this->load->view("VLoginUsuario", $data);
                }
            }
    	  }

        //Método para iniciar sesión regularmente...
    	  function login() {
    	  	  $mensaje = "";
              $usuario = $this->input->post("email", FILTER_SANITIZE_STRING);
              $clave = $this->input->post("clave", FILTER_SANITIZE_STRING);
              $claveEncriptada = sha1($clave);
              $resultado = $this->MLoginUsuario->login($usuario, $claveEncriptada);

              if ($usuario == "") {
                  $mensaje = "Debe ingresar su e-mail";
              } else {
                  if ($clave == "") {
                      $mensaje = "Debe ingresar su clave";
                  } else {
                        if ($resultado != null) {
                           $id_usuario = $resultado->id;
                           $id_email = $resultado->email;
                           $_SESSION["id_usuario"] = $id_usuario;
                           $_SESSION["email"] = $id_email;
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