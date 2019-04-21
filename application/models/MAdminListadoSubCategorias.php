<?php

    class MAdminListadoSubCategorias extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerSubCategorias($id) {
    	  	  $this->db->select("*");
    	  	  $this->db->from("subcategorias");
    	  	  $this->db->where("idCategoria", $id);
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
    	  function eliminarSubCategoria($id) {
    	      $this->db->delete("subcategorias", array("id" => $id));	  
    	  }
    }

?>