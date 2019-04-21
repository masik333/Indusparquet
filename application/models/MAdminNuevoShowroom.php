<?php

    class MAdminNuevoShowroom extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function verificarShowroom($direccion) {
            $this->db->select("direccion");
            $this->db->from("showrooms");
            $this->db->where("direccion", $direccion);  
            $resultado = $this->db->get();
            return $resultado->row();
        }
    	  function registrarShowroom($param) {
    	  	  $this->db->insert("showrooms", $param);
    	  }
    }

?>