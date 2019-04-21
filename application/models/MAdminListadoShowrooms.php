<?php

    class MAdminListadoShowrooms extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function listadoShowrooms() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("showrooms");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function eliminarShowroom($id) {
            $this->db->delete("showrooms", array("id" => $id)); 
        }
        function filtrarShowrooms($busqueda) {
            $this->db->select("*");
            $this->db->from("showrooms");
            $this->db->like("nombre", $busqueda);
            $result = $this->db->get();
            return $result->result();
        }
    }

?>