<?php

    class MAdminEdicionProducto extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerCategorias() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("categorias");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
    	  function traerSubCategorias() {
            $this->db->select("*");
    	  	  $this->db->from("subcategorias");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
    	  function traerDatosProducto($id) {
            $this->db->select("*");
            $this->db->from("productos");
            $this->db->where("id", $id);
            $result = $this->db->get();

            if ($result->num_rows() == 1) {
                return $result->row();
            } else {
                return null;
            }
    	  }
    	  function traerSubCategoria($idCat) {
    	  	  $this->db->select("*");
            $this->db->from("subcategorias");
            $this->db->where("idCategoria", $idCat);
            $this->db->order_by("id", "ASC");
            $result = $this->db->get();
            return $result->result();
    	  }
    	  function traerImagenesProducto($id) {
    	  	  $this->db->select("*");
    	  	  $this->db->from("imagenesproducto");
    	  	  $this->db->where("idProducto", $id);
    	  	  $result = $this->db->get();
            return $result->result();
    	  }
        function modificarProducto($id, $params) {
            $this->db->where("id", $id);
            $this->db->update("productos", $params);
            return $this->db->get("productos")->row()->id;
        }
        function verificarProducto($id, $nombre) {
              $this->db->select("nombre");
              $this->db->from("productos");
              $this->db->where("nombre", $nombre);
              $this->db->where("id !=", $id);
              $result = $this->db->get();

              if ($result->num_rows() > 0) {
                  return $result->row();
              } else {
                  return null;
              }  
        }
        function traerId($idProducto) {
            $this->db->select("id");
            $this->db->from("imagenesproducto");
            $this->db->where("idProducto", $idProducto);
            return $this->db->get()->row()->id;
        }
        function modificarImagen($id_imagen, $paramsImg) {
            $this->db->where("id", $id_imagen);
            $this->db->update("imagenesproducto", $paramsImg);
        }
        function registrarImagen($paramsImg) {
            $this->db->insert("imagenesproducto", $paramsImg);
        }
    }

?>