<?php

    class MAdminListadoUsuarios extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function listadoUsuarios() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("usuarios");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function eliminarUsuario($id) {
            $this->db->delete("usuarios", array("id" => $id)); 
        }
        function filtrarUsuarios($busqueda) {
            $this->db->select("*");
            $this->db->from("usuarios");
            $this->db->like("nombre", $busqueda);
            $result = $this->db->get();
            return $result->result();
        }
    }

?>