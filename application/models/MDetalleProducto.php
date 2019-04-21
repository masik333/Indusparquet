<?php

    class MDetalleProducto extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerDatosProducto($id) {
    	  	  $this->db->select("*");
    	  	  $this->db->from("productos");
    	  	  $this->db->where("id", $id);
    	  	  $result = $this->db->get();
    	  	  return $result->row();
    	  }
    	  function traerImagenes($id) {
    	  	  $this->db->select("imagen");
    	  	  $this->db->from("imagenesproducto");
    	  	  $this->db->where("idProducto", $id);
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function traerCategorias() {
            $this->db->select("*");
            $this->db->from("categorias");
            $result = $this->db->get();
            return $result->result();
        }

        function getSubCat($id_cat = 0) {
            $this->db->select("*");
            $this->db->from("subcategorias");
            $this->db->where("idCategoria", $id_cat);
            $this->db->order_by("subCategoria", "ASC");
            $result = $this->db->get();
            return $result->result();
        }
        function traerIdCat($id) {
            $this->db->select("idCategoria");
            $this->db->from("productos");
            $this->db->where("id", $id);
            $result = $this->db->get();
            return $result->row()->idCategoria;
        }
        function interesar($id, $idCat) {
            $this->db->select("*, productos.id AS prod");
            $this->db->from("productos");  
            $this->db->join("categorias", "productos.idCategoria = categorias.id");
            $this->db->join("subcategorias", "subcategorias.id = productos.idSubCategoria", "LEFT OUTER");
            $this->db->where("productos.id != ", $id);
            $this->db->where("productos.idCategoria", $idCat);
            $this->db->limit(3);
            $result = $this->db->get();
            return $result->result(); 
        }
        function verificarProducto($idProd) {
            $this->db->select("*");
            $this->db->from("productos");
            $this->db->where("id", $idProd);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        function modificarStock($idProd, $stockTotal) {
            $this->db->where("id", $idProd);
            $this->db->set("stock", $stockTotal);
            $this->db->update("productos");
        }

        function verificarCarrito($idProd, $idCliente) {
            $this->db->select("*");
            $this->db->from("carrito");
            $this->db->where("idProducto", $idProd);
            $this->db->where("idCliente", $idCliente);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }
        function guardarEnCarrito($params) {
            $this->db->insert("carrito", $params);
        }
        function actualizarCarrito($idProd, $idCliente, $params) {
            $this->db->where("idProducto", $idProd);
            $this->db->where("idCliente", $idCliente);
            $this->db->update("carrito", $params);
        }
        function totalCarrito($idCliente) {
            return $this->db->where("idCliente", $idCliente)->from("carrito")->count_all_results();
        }
        function filtrarProductos($limit, $start, $busqueda) {
            $this->db->limit($limit, $start);
            $this->db->select("*, productos.id AS prod");
            $this->db->from("productos");
            $this->db->join("categorias", "categorias.id = productos.idCategoria");
            $this->db->join("subcategorias", "subcategorias.id = productos.idSubCategoria", "LEFT OUTER");
            $this->db->like("productos.nombre", $busqueda);
            $result = $this->db->get();
            return $result->result(); 
        }
        public function get_count() {
            return $this->db->count_all("productos");
        }
        public function get_count_filtro($busqueda) {
            $this->db->count_all_results('productos');
            $this->db->like('nombre', $busqueda);
            $this->db->from('productos');
            return $this->db->count_all_results();
        }
    }

?>