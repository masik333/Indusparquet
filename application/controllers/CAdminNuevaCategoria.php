<?php

    class CAdminNuevaCategoria extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminNuevaCategoria");
    	  }
    	  function index() {
    	  	  $this->load->view("VAdminNuevaCategoria");
    	  }
    	  function registrarCategoria() {
    	  	  $categoria = $this->input->post("categoria");
              $mensaje = ""; 

    	  	  if ($categoria == "") {
    	  	  	  $mensaje = "Se debe ingresar la categoría";
    	  	  } else {
    	  	  	  if (strlen($categoria) > 50) {
    	  	  	  	  $mensaje = "La categoría debe contener menos de 50 caracteres";
    	  	  	  } else {
    	  	  	  	  $param = array(
                          "categoria" => $categoria
    	  	  	  	  );

    	  	  	  	  $this->MAdminNuevaCategoria->registrarCategoria($param);
    	  	  	  	  $mensaje = "Categoría registrada con éxito";
    	  	  	  }
    	  	  }
    	  	  echo json_encode($mensaje);
    	  }
    }

?>