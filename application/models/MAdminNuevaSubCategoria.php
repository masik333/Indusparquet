<?php

    class MAdminNuevaSubCategoria extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function registrarSubCategoria($param) {
    	  	  $this->db->insert("subcategorias", $param);
    	  }
    }

?>