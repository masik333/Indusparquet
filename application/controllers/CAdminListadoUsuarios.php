<?php

    class CAdminListadoUsuarios extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoUsuarios");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminListadoUsuarios->listadoUsuarios();
    	  	  $this->load->view("VAdminListadoUsuarios", $data);
    	  }
        function eliminarUsuario() {
            $id = $_GET["id"];
            $this->MAdminListadoUsuarios->eliminarUsuario($id);
            $mensaje = "Usuario eliminado con éxito";
            echo json_encode($mensaje);
        }
        function filtrarUsuarios() {
            $busqueda = $_GET["busqueda"];

            if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                redirect(base_url() . 'CAdminListadoUsuarios', 'refresh');
            }

            $data["resultadoUsuarios"] = $this->MAdminListadoUsuarios->filtrarUsuarios($busqueda);
            $this->load->view("VAdminListadoUsuarios", $data);
        }
    }

?>