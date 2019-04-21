<?php

    class MCarrito extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerCarrito($id) {
    	  	  $this->db->select("*, productos.id AS prod");
    	  	  $this->db->from("carrito");
    	  	  $this->db->join("productos", "productos.id = carrito.idProducto");
    	  	  $this->db->join("categorias", "productos.idCategoria = categorias.id");
    	  	  $this->db->where("carrito.idCliente", $id);
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function traerStock($idProducto, $idCliente) {
            $this->db->select("cantidadMetros");
            $this->db->from("carrito");
            $this->db->where("idCliente", $idCliente);
            $this->db->where("idProducto", $idProducto);
            $result = $this->db->get();
            return $result->row()->cantidadMetros;
        }
        function stockProd($idProducto) {
            $this->db->select("stock");
            $this->db->from("productos");
            $this->db->where("id", $idProducto);
            $result = $this->db->get();
            return $result->row()->stock;
        }
    	  function eliminarCompra($idCliente, $idProducto) {
    	  	  $this->db->where("idCliente", $idCliente);
    	  	  $this->db->where("idProducto", $idProducto);
    	  	  $this->db->limit(1);
    	  	  $this->db->delete("carrito");
    	  }
        function actualizarStock($restaurarStock, $idProducto) {
            $this->db->where("id", $idProducto);
            $this->db->set("stock", $restaurarStock);
            $this->db->update("productos");
        }
    }

?>