<?php

    class CAdminListadoCategorias extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoCategorias");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminListadoCategorias->traerCategorias();
    	  	  $this->load->view("VAdminListadoCategorias", $data);
    	  }
          function filtrarCategorias() {
            $busqueda = $_GET["busqueda"];

            if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                redirect(base_url() . 'CAdminListadoCategorias', 'refresh');
            }

            $data["resultadoCategorias"] = $this->MAdminListadoCategorias->filtrarCategorias($busqueda);
            $this->load->view("VAdminListadoCategorias", $data);
        }
        function eliminarCategoria() {
            $id = $_GET["id"];
            $this->MAdminListadoCategorias->eliminarCategoria($id);
            $mensaje = "Categoría eliminada con éxito";
            echo json_encode($mensaje);
        }
    }

?>