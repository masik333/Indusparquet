+<?php

    class MCambiarClaveUsuario extends CI_Model {
    	function __construct() {
    	  	parent::__construct();
    	}
    	function verificarClaveActual($id, $claveActualEncriptada) {
            $this->db->select("clave");
            $this->db->from("clientes");
            $this->db->where("clave", $claveActualEncriptada);
            $this->db->where("id", $id);
            $result = $this->db->get();
            return $result->row();
        }
    	function cambiarClave($id, $param) {
    	  	$this->db->where("id", $id);
            $this->db->update("clientes", $param);
    	}
    }

?>