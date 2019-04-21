<?php

    class CLogoutAdmin extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  session_start();
    	  }
    	  function logoutAdmin() {
    	  	  $this->session->unset_userdata("logged_in");
	          $this->session->sess_destroy();
	          redirect(base_url() . "CIndex");
    	  }
    }

?>