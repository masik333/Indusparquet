<?php

    class MAdminEdicionShowroom extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerDatosShowroom($id) {
    	  	  $this->db->select("*");
            $this->db->from("showrooms");
            $this->db->where("id", $id);
            $result = $this->db->get();

            if ($result->num_rows() == 1) {
                return $result->row();
            } else {
                return null;
            }
    	  }
    	  function verificarShowroom($direccion) {
    	  	  $this->db->select("direccion");
            $this->db->from("showrooms");
            $this->db->where("direccion", $direccion);  
            $resultado = $this->db->get();
            return $resultado->row();
    	  }
    	  function modificarShowroom($id, $param) {
    	  	  $this->db->where("id", $id);
            $this->db->update("showrooms", $param);
    	  }
    }

?>