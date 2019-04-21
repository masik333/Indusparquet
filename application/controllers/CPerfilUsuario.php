<?php

    class CPerfilUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

    	  	  if (!isset($_SESSION["id_usuario"])) {
                  redirect(base_url() . 'CLoginUsuario', 'refresh');
                  die();
              }
    	  }
    	  function index() {
    	  	  $this->load->view("VPerfilUsuario");
    	  }
    }

?>