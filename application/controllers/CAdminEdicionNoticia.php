<?php

    class CAdminEdicionNoticia extends CI_Controller {
    	  function __construct() {
    	  	   parent::__construct();

             if (!isset($_SESSION["id_admin"])) {
                 redirect(base_url() . 'CLogin', 'refresh');
                 die();
             }
 
    	  	   $this->load->model("MAdminEdicionNoticia");
    	  }
    	  function index() {
    	  	   $id = $_GET["id"];
             $data["resultado"] = $this->MAdminEdicionNoticia->traerDatosNoticia($id);

             if ($data["resultado"]) {
    	  	       $this->load->view("VAdminEdicionNoticia", $data);
             } else {
                 redirect(base_url() . 'CAdminListadoNoticias', 'refresh');
             }
    	  }
    	  function modificarNoticia($id) {
             $errores = array();
    	  	   $titulo = $this->input->post("titulo");
    	  	   $contenido = $this->input->post("contenido");

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
               
             if (sizeof($errores) == 0) {

                 $param = array(
                    "titulo" => $titulo,
                    "contenido" => $contenido
                 );

                  $config['upload_path'] = 'assets/img/noticias';
			            $config['allowed_types'] = 'jpg|png|jpeg';
			            $config['overwrite'] = TRUE;
			            $config['max_width']  = '1920';
			            $config['max_height']  = '1600';
                        $config['encrypt_name'] = TRUE;

			            $this->load->library('upload', $config);
			            $this->upload->initialize($config);

			      	    if ($this->upload->do_upload('imagen')) {
                            //Eliminamos la imagen del servidor antes de actualizar la nueva imagen.
                            $imagePath = 'assets/img/noticias/'; 
                            $queryGetImage = $this->MAdminEdicionNoticia->traerImagen($id);

                            $filename = $imagePath . $queryGetImage->imagen; 
                            if (file_exists($filename)) {
                                unlink($filename);
                            }

			      		    $fileData = $this->upload->data();
			      		    $nombreArchivo = $fileData['file_name'];

                            $param["imagen"] = $nombreArchivo;
			      	    }

			            $this->MAdminEdicionNoticia->modificarNoticia($id, $param);
			            $mensaje = "Datos de la noticia actualizada con éxito";
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