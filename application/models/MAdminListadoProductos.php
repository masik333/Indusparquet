<?php

    class MAdminListadoProductos extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerProductos() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("productos");
            $this->db->order_by("fechaIngreso", "DESC");
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
          function traerImagenes($id) {
              $this->db->select("imagen");
              $this->db->from("imagenesproducto");
              $this->db->where("idProducto", $id);
              $result = $this->db->get();
              return $result->result();
          }
    	  function eliminarProducto($id) {
    	  	  $this->db->delete("productos", array("id" => $id)); 
              $this->db->delete("imagenesproducto", array("idProducto" => $id)); 
    	  }
          function eliminarProductoCarrito($id) {
             $this->db->where("idProducto", $id);
             $this->db->delete("carrito");  
          }
        function filtrarProductos($busqueda) {
            $this->db->select("*");
            $this->db->from("productos");
            $this->db->like("nombre", $busqueda);
            $result = $this->db->get();
            return $result->result();
        }
    }

?>