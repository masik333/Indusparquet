<?php

    class MAdminNuevaCategoria extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function registrarCategoria($param) {
    	  	  $this->db->insert("categorias", $param);
    	  }
    }

?>