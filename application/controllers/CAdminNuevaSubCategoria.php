<?php

    class CAdminNuevaSubCategoria extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminNuevaSubCategoria");
    	  }
    	  function index() {
    	  	  $data["id"] = $_GET["id"];
    	  	  $this->load->view("VAdminNuevaSubCategoria", $data);
    	  }
    	  function registrarSubCategoria() {
    	  	  $idCat = $_GET["id"];
    	  	  $subcategoria = $this->input->post("subcategoria");
              $mensaje = ""; 

    	  	  if ($subcategoria == "") {
    	  	  	  $mensaje = "Se debe ingresar la SubCategoría";
    	  	  } else {
    	  	  	  if (strlen($subcategoria) > 50) {
    	  	  	  	  $mensaje = "La subcategoría debe contener menos de 50 caracteres";
    	  	  	  } else {
    	  	  	  	  $param = array(
    	  	  	  	  	  "idCategoria" => $idCat,
                          "subCategoria" => $subcategoria
    	  	  	  	  );

    	  	  	  	  $this->MAdminNuevaSubCategoria->registrarSubCategoria($param);
    	  	  	  	  $mensaje = "SubCategoría registrada con éxito";
    	  	  	  }
    	  	  }
    	  	  echo json_encode($mensaje);
    	  }
    }

?>