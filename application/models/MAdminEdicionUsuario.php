<?php

    class MAdminEdicionUsuario extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerDatosUsuario($id) {
    	  	  $this->db->select("*");
            $this->db->from("usuarios");
            $this->db->where("id", $id);
            $result = $this->db->get();

            if ($result->num_rows() == 1) {
                return $result->row();
            } else {
                return null;
            }
    	  }
    	  function verificarClaveActual($id, $claveActualEncriptada) {
            $this->db->select("clave");
            $this->db->from("usuarios");
            $this->db->where("clave", $claveActualEncriptada);
            $this->db->where("id", $id);
            $result = $this->db->get();
            return $result->row();
        }
    	  function modificarUsuario($id, $param) {
    	  	  $this->db->where("id", $id);
            $this->db->update("usuarios", $param);
    	  }
    }

?>