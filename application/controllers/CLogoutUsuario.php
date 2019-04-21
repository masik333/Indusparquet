<?php

    class CLogoutUsuario extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  session_start();
              $this->load->library("facebook");
    	  }
    	  function logout() {
    	  	  $this->session->unset_userdata("logged_in");
              $this->facebook->destroy_session();
	          $this->session->sess_destroy();
	          redirect(base_url() . "CLoginUsuario");
    	  }
    }

?>