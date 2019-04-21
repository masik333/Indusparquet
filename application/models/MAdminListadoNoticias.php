<?php

    class MAdminListadoNoticias extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function listadoNoticias() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("noticias");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function eliminarNoticia($id) {
            $this->db->delete("noticias", array("id" => $id)); 
        }
        function traerImagen($id) {
            $this->db->select("imagen");
            $this->db->from("noticias");
            $this->db->where("id", $id);
            $result = $this->db->get();
            return $result->row();
        }
        function filtrarNoticias($busqueda) {
            $this->db->select("*");
            $this->db->from("noticias");
            $this->db->like("titulo", $busqueda);
            $result = $this->db->get();
            return $result->result();
        }
    }

?>