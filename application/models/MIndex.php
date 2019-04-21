<?php

    class MIndex extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  } 
    	  function nuevoIngreso() {
    	  	  $this->db->select("*, productos.id AS prod");
    	  	  $this->db->from("productos");
              $this->db->join("categorias", "categorias.id = productos.idCategoria");
              $this->db->join("subcategorias", "subcategorias.id = productos.idSubCategoria", "LEFT OUTER");
    	  	  $this->db->order_by("fechaIngreso", "DESC");
    	  	  $this->db->limit(3);
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
        function totalCarrito($idCliente) {
            return $this->db->where("idCliente", $idCliente)->from("carrito")->count_all_results();
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