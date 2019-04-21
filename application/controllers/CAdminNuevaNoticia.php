<?php

    class CAdminNuevaNoticia extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminNuevaNoticia");
    	  }
    	  function index() {
    	  	  $this->load->view("VAdminNuevaNoticia"); 
    	  }
    	  function registrarNoticia() {
    	  	  $errores = array();
    	  	  $titulo = $this->input->post("titulo");
    	  	  $contenido = $this->input->post("contenido");
              setlocale(LC_TIME, 'spanish');
              $fecha = strftime("%d de %B, %Y");

            $mensajes = "";

    	  	  if ($titulo == "") {
                  $errores[] = "Se debe ingresar un título de la noticia";
    	  	  }

    	  	  if (strlen($titulo) > 20) {
    	  	  	  $errores[] = "El título debe contener menos de 20 caracteres";
    	  	  }

    	  	  if ($contenido == "") {
    	  	  	  $errores[] = "Se debe ingresar el contenido de la noticia";
    	  	  }

    	  	  if (strlen($contenido) > 500) {
    	  	  	  $errores[] = "El contenido de la noticia debe contener menos de 500 caracteres";
    	  	  }

    	  	  if (empty($_FILES['imagen']['name'])) {
                $errores[] = "Debe subir una imagen de la noticia"; 
            }

            if (sizeof($errores) == 0) {
                $config['upload_path'] = 'assets/img/noticias';
			          $config['allowed_types'] = 'jpg|png|jpeg';
			          $config['overwrite'] = TRUE;
			          $config['max_width']  = '1920';
			          $config['max_height']  = '1600';
                      $config['encrypt_name'] = TRUE;

			          $this->load->library('upload', $config);
			          $this->upload->initialize($config);
			          $uploadData = array();

			      if (!empty($_FILES['imagen']['name'])) {
              
                $_FILES['imagend']['name'] = $_FILES['imagen']['name'];
			      	  $_FILES['imagend']['type'] = $_FILES['imagen']['type'];
			      	  $_FILES['imagend']['tmp_name'] = $_FILES['imagen']['tmp_name'];
			      	  $_FILES['imagend']['error'] = $_FILES['imagen']['error'];
			      	  $_FILES['imagend']['size'] = $_FILES['imagen']['size'];

			      	  $this->load->library('upload', $config);
			      	  $this->upload->initialize($config);
			      	  
                if ($this->upload->do_upload('imagend')) {
			      		  $fileData = $this->upload->data();
			      		  $uploadData['file_name'] = $fileData['file_name'];
			      	  }
			      }

			      $param = array(
                "titulo" => $titulo,
                "contenido" => $contenido,
				        "imagen" => $uploadData['file_name'],
                "fecha" => $fecha
			      );

			      $this->MAdminNuevaNoticia->guardarNoticia($param);
			      $mensaje = "Noticia registrada con éxito";
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