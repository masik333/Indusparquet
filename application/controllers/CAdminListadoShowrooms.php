<?php

    class CAdminListadoShowrooms extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoShowrooms");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminListadoShowrooms->listadoShowRooms();
    	  	  $this->load->view("VAdminListadoShowrooms", $data);
    	  }
    	  function eliminarShowroom() {
              $id = $_GET["id"];
              $this->MAdminListadoShowrooms->eliminarShowroom($id);
              $mensaje = "Showroom eliminado con éxito";
              echo json_encode($mensaje);
        }
        function filtrarShowrooms() {
            $busqueda = $_GET["busqueda"];

            if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                redirect(base_url() . 'CAdminListadoShowrooms', 'refresh');
            }

            $data["resultadoShowrooms"] = $this->MAdminListadoShowrooms->filtrarShowrooms($busqueda);
            $this->load->view("VAdminListadoShowrooms", $data);
        }
    }

?>