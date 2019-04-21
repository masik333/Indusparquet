<?php

    class CAdminListadoSubCategorias extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoSubCategorias");
    	  }
    	  function index() {
    	  	  $id = $_GET["id"];
    	  	  $data["id"] = $_GET["id"];
    	  	  $data["resultado"] = $this->MAdminListadoSubCategorias->traerSubCategorias($id);
    	  	  $this->load->view("VAdminListadoSubCategorias", $data);
    	  }
    	  function eliminarSubCategoria() {
    	  	  $id = $_GET["id"];
              $this->MAdminListadoSubCategorias->eliminarSubCategoria($id);
              $mensaje = "SubCategoría eliminada con éxito";
              echo json_encode($mensaje);
        }
    }

?>