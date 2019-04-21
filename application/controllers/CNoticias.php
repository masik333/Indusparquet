<?php

    class CNoticias extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MNoticias");
    	  }
    	  function index() {

              if (isset($_GET["id"])) {
                  $idNoticia = $_GET["id"];
                  $data["resultado"] = $this->MNoticias->filtrarNoticias($idNoticia);

                  //if ($data["resultado"]) {
                      $id = $data["resultado"]->id; 
                      $data["ultimasNoticias"] = $this->MNoticias->ultimasNoticias($id);
                  //}
              } else {
    	  	      $data["resultado"] = $this->MNoticias->mostrarNoticias();

                  $id = $data["resultado"]->id; 
                  $data["ultimasNoticias"] = $this->MNoticias->ultimasNoticias($id);
              }
 
              if ($data["resultado"]) {
    	  	      $this->load->view("VNoticias", $data);
              } else {
                  redirect(base_url() . "CIndex", "refresh");
              }
    	  }
    }

?>