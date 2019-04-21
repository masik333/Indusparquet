<?php

    class MAdminNuevoProducto extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerCategorias() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("categorias");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function traerSubCategoria($idCat) {
            $this->db->select("*");
            $this->db->from("subcategorias");
            $this->db->where("idCategoria", $idCat);
            $this->db->order_by("id", "ASC");
            $result = $this->db->get();
            return $result->result();
        }
        function verificarProducto($nombre) {
            $this->db->select("nombre");
            $this->db->from("productos");
            $this->db->where("nombre", $nombre);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }  
        }
        function registrarProducto($params) {
            $this->db->insert("productos", $params);
            return $this->db->insert_id();
        }
        function guardarArrayImagenes($imagend) {
            $this->db->insert("imagenesproducto", $imagend);
        }
    }

?>