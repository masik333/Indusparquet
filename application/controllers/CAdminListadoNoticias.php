<?php

    class CAdminListadoNoticias extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoNoticias");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminListadoNoticias->listadoNoticias();
    	  	  $this->load->view("VAdminListadoNoticias", $data);
    	  }
    	  function eliminarNoticia() {
              $id = $_GET["id"];

              $imagePath = 'assets/img/noticias/'; 
              $queryGetImage = $this->MAdminListadoNoticias->traerImagen($id);

              $filename = $imagePath . $queryGetImage->imagen; 
              if (file_exists($filename)) {
                  unlink($filename);
              }

              $this->MAdminListadoNoticias->eliminarNoticia($id);
              $mensaje = "Noticia eliminada con éxito";
              echo json_encode($mensaje);
        }
        function filtrarNoticias() {
            $busqueda = $_GET["busqueda"];

            if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                redirect(base_url() . 'CAdminListadoNoticias', 'refresh');
            }

            $data["resultadoNoticias"] = $this->MAdminListadoNoticias->filtrarNoticias($busqueda);
            $this->load->view("VAdminListadoNoticias", $data);
        }
    }

?>