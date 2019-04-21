<?php

    class MAdminNuevaNoticia extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function guardarNoticia($param) {
    	  	  $this->db->insert("noticias", $param);
    	  }
    }

?>