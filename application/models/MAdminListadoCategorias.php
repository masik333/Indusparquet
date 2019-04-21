<?php

    class MAdminListadoCategorias extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerCategorias() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("categorias");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function filtrarCategorias($busqueda) {
            $this->db->select("*");
            $this->db->from("categorias");
            $this->db->like("categoria", $busqueda);
            $result = $this->db->get();
            return $result->result();
        }
        function eliminarCategoria($id) {
            $this->db->delete("categorias", array("id" => $id)); 
            $this->db->delete("subcategorias", array("idCategoria" => $id));
        }
    }

?>